<?php
session_start();
require 'includes/dbconnection.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    echo "<script>alert('Please login to view your bookings.'); window.location.href = 'login.php';</script>";
    exit();
}

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
                        <div class="booking-card card shadow-lg border-0 rounded-4 overflow-hidden h-100">

                            <!-- Card Header -->
                            <div class="card-header d-flex justify-content-between align-items-center features-section text-white py-3">
                                <span class="fw-semibold">
                                    Booking ID: <?php echo $row['booking_id']; ?>
                                </span>

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

                            <!-- Card Body -->
                            <div class="card-body p-4">

                                <h4 class="fw-bold text-primary mb-3">
                                    <?php echo $row['title']; ?>
                                </h4>

                                <p class="mb-2">
                                    <i class="fa fa-calendar-alt me-2 text-secondary"></i>
                                    <strong>Date:</strong> <?php echo $row['show_date']; ?>
                                </p>

                                <p class="mb-2">
                                    <i class="fa fa-clock me-2 text-danger"></i>
                                    <strong>Time:</strong> <?php echo date("h:i A", strtotime($row['show_time'])); ?>
                                </p>

                                <p class="mb-2">
                                    <i class="fa fa-map-marker-alt me-2 text-success"></i>
                                    <strong>Theater:</strong> <?php echo $row['theater_name']; ?>
                                </p>

                                <p class="mb-3">
                                    <i class="fa fa-chair me-2 text-primary"></i>
                                    <strong>Seats:</strong> <?php echo $row['seat_row'] . "-" . $row['total_seat']; ?>
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                    <span class="fw-semibold text-muted">Total Amount</span>
                                    <span class="fw-bold fs-4 text-success">
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

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>