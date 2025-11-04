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
    <!-- 🎬 My Bookings Section -->
    <div class="container my-5">
        <h2 class="booking-header text-center fw-bold text-light rounded py-3 mb-4 shadow-sm">
            My Bookings
        </h2>

        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="card-body bg-light p-4">
                <div class="table-responsive">
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th class="fw-semibold fs-5">Booking ID</th>
                                    <th class="fw-semibold fs-5">Movie</th>
                                    <th class="fw-semibold fs-5">Show</th>
                                    <th class="fw-semibold fs-5">Theater</th>
                                    <th class="fw-semibold fs-5">Seats</th>
                                    <th class="fw-semibold fs-5">Amount (₹)</th>
                                    <th class="fw-semibold fs-5">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr class="bg-white border-bottom">
                                        <td class="py-3"><?php echo $row['booking_id']; ?></td>
                                        <td class="py-3 fw-semibold text-primary"><?php echo $row['title']; ?></td>
                                        <td class="py-3"><?php echo $row['show_date'] . ' • ' . date("h:i A", strtotime($row['show_time'])); ?></td>
                                        <td class="py-3"><?php echo $row['theater_name']; ?></td>
                                        <td class="py-3"><?php echo $row['seat_row'] . "-" . $row['total_seat']; ?></td>
                                        <td class="py-3 fw-bold text-success"><?php echo "₹" . number_format($row['amount'], 2); ?></td>
                                        <td class="py-3">
                                            <?php if ($row['booking_status'] == 'Pending') { ?>
                                                <span class="badge bg-warning text-dark px-3 py-2 fs-6 fw-semibold shadow-sm">Pending</span>
                                            <?php } elseif ($row['booking_status'] == 'Approved') { ?>
                                                <span class="badge bg-success px-3 py-2 fs-6 fw-semibold shadow-sm">Approved</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger px-3 py-2 fs-6 fw-semibold shadow-sm">Cancelled</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="alert alert-danger text-center fw-semibold border-2 border-danger shadow-sm py-4">
                            You have no bookings yet!
                            <a href="movies.php" class="alert-link text-decoration-none fw-bold">Book Now</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>