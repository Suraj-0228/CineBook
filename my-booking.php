<?php
session_start();
require 'includes/dbconnection.php';
$user_id = $_SESSION['user_id'];
$query = "SELECT b.*, m.title, s.show_date, s.show_time, t.theater_name 
          FROM bookings b
          JOIN movies_details m ON b.movie_id = m.movie_id
          JOIN showtimes s ON b.show_id = s.show_id
          JOIN theaters t ON s.theater_id = t.theater_id
          WHERE b.user_id = '$user_id' ";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- My Booking Details -->
    <div class="container my-5">
        <h2 class="booking-header text-center fw-bold text-light rounded py-3 mb-4 shadow-sm">
            My Bookings
        </h2>
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <div class="row g-4">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="booking-card card shadow border-0 rounded-4 h-100">
                            <div class="card-header d-flex justify-content-between align-items-center text-white py-3"
                                style="background: linear-gradient(135deg, #19589c, #143f70);">
                                <div>
                                    <small class="text-white-50 d-block">Booking ID: <?php echo $row['booking_id']; ?></small>
                                    <h5 class="mb-0 fw-semibold"><?php echo $row['title']; ?></h5>
                                </div>

                                <?php if ($row['booking_status'] == 'Pending') { ?>
                                    <span class="badge bg-warning text-dark fw-semibold px-3 py-2 shadow-sm">
                                        <i class="fa fa-clock me-1"></i> Pending
                                    </span>
                                <?php } elseif ($row['booking_status'] == 'Approved') { ?>
                                    <span class="badge bg-success fw-semibold px-3 py-2 shadow-sm">
                                        <i class="fa fa-check-circle me-1"></i> Approved
                                    </span>
                                <?php } else { ?>
                                    <span class="badge bg-danger fw-semibold px-3 py-2 shadow-sm">
                                        <i class="fa fa-times-circle me-1"></i> Cancelled
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <ul class="list-unstyled mb-3">
                                    <li class="mb-2">
                                        <i class="fa fa-calendar-alt me-2 text-secondary"></i>
                                        <strong>Date:</strong>
                                        <span class="text-muted"><?php echo $row['booking_date']; ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fa fa-clock me-2 text-danger"></i>
                                        <strong>Time:</strong>
                                        <span class="text-muted"><?php echo date("h:i A", strtotime($row['show_time'])); ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fa fa-map-marker-alt me-2 text-success"></i>
                                        <strong>Theater:</strong>
                                        <span class="text-muted"><?php echo $row['theater_name']; ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fa fa-chair me-2 text-primary"></i>
                                        <strong>Seats:</strong>
                                        <span class="text-muted"><?php echo $row['seat_row'] . "-" . $row['total_seat']; ?></span>
                                    </li>
                                </ul>
                                <?php if ($row['booking_status'] == 'Pending') { ?>
                                    <form action="controllers/cancel_booking.php" method="POST" class="mt-1 mb-3">
                                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                        <button type="submit"
                                            class="bg-danger px-5 py-2 text-white border border-0 rounded fw-semibold text-center text-decoration-none fw-semibold w-100">
                                            <i class="fa-solid fa-ban me-2"></i> Cancel Booking
                                        </button>
                                    </form>
                                <?php } ?>
                                <div class="mt-auto pt-3 border-top d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold text-muted">Total Amount</span>
                                    <span class="fw-bold fs-5 text-success">
                                        ₹<?php echo number_format($row['amount'], 2); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>

            <div class="card shadow-lg border-0 rounded-4 bg-light p-5 text-center mx-auto" style="max-width: 500px;">
                <i class="fa fa-ticket-alt fa-3x text-secondary mb-3"></i>
                <h5 class="fw-bold mb-2">No Bookings Found</h5>
                <p class="text-muted mb-3">You have no movie bookings yet.</p>
                <a href="movies.php" class="btn btn-primary px-4 fw-semibold shadow-sm">Browse Movies</a>
            </div>
        <?php } ?>
    </div>

    <!-- Booking Cancel Success Modal -->
    <div class="modal fade" id="cancelSuccessModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <div class="modal-header border-0 flex-column align-items-center pt-4 pb-2">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2"
                        style="width: 70px; height: 70px; background-color: rgba(220,53,69,0.08);">
                        <i class="fa-solid fa-circle-check text-success fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0 text-danger">Booking Cancelled</h4>
                </div>
                <div class="modal-body text-center pt-2 pb-3 px-4">
                    <p class="text-muted mb-0">
                        Your booking has been cancelled successfully.
                        You can book another movie anytime.
                    </p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button class="btn btn-danger rounded-pill px-4 fw-semibold" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <?php if (!empty($_SESSION['popup_type']) && $_SESSION['popup_type'] == "booking_cancel") { ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var cancelModal = new bootstrap.Modal(document.getElementById("cancelSuccessModal"));
                cancelModal.show();
            });
        </script>
    <?php unset($_SESSION['popup_type']);
    } ?>

</body>

</html>