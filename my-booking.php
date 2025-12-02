<?php
session_start();
require 'includes/dbconnection.php';
$user_id = $_SESSION['user_id'];

$limit = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $limit;

$count_sql = "SELECT COUNT(*) AS total FROM bookings WHERE user_id = '$user_id'";
$count_result = mysqli_query($con, $count_sql);
$count_row = mysqli_fetch_assoc($count_result);
$total_records = (int)$count_row['total'];
$total_pages = $total_records > 0 ? ceil($total_records / $limit) : 1;

$query = "SELECT b.*, m.title, s.show_date, s.show_time, t.theater_name 
          FROM bookings b
          JOIN movies_details m ON b.movie_id = m.movie_id
          JOIN showtimes s ON b.show_id = s.show_id
          JOIN theaters t ON s.theater_id = t.theater_id
          WHERE b.user_id = '$user_id'
          ORDER BY b.booking_id DESC
          LIMIT $limit OFFSET $offset";

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieMate - My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.svg" type="image/x-icon">
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
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="booking-card card shadow border-0 rounded-4 h-100">
                            <div class="card-header d-flex justify-content-between align-items-center text-white py-3"
                                style="background: linear-gradient(135deg, #19589c, #143f70);">
                                <div>
                                    <small class="text-white-50 d-block">Booking ID: #<?php echo $row['booking_id']; ?></small>
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
                                    <?php
                                    // Raw seat string from DB, e.g. "A01, A02, A03"
                                    $seatStr = isset($row['seat_row']) ? trim($row['seat_row']) : '';

                                    // Split on commas, remove extra spaces & empty values
                                    $seats = preg_split('/\s*,\s*/', $seatStr, -1, PREG_SPLIT_NO_EMPTY);

                                    // Sort if you want them in order (optional)
                                    sort($seats);
                                    ?>
                                    <li class="mb-2">
                                        <i class="fa fa-chair me-2 text-primary"></i>
                                        <strong>Seats:</strong>
                                        <span class="text-muted">
                                            <?php
                                            if (empty($seats)) {
                                                echo "N/A";
                                            } elseif (count($seats) === 1) {
                                                // Only one seat
                                                echo "(" . $seats[0] . ")";
                                            } else {
                                                // Range: first - last
                                                $firstSeat = $seats[0];
                                                $lastSeat  = $seats[count($seats) - 1];
                                                echo "(" . $firstSeat . " - " . $lastSeat . ")";
                                            }
                                            ?>
                                        </span>
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

            <!-- Pagination -->
            <?php if ($total_pages > 1) { ?>
                <nav aria-label="Bookings pagination">
                    <ul class="pagination justify-content-center mt-4">
                        <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page - 1; ?>" tabindex="-1">
                                Previous
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $page + 1; ?>">
                                Next
                            </a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>
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
                    <button class="bg-danger px-5 py-2 text-white border border-0 rounded fw-semibold text-center text-decoration-none fw-semibold" data-bs-dismiss="modal">
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