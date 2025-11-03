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
    <div class="container my-4">
        <h2 class="booking-header text-center fw-bold rounded p-2 mb-3">My Bookings</h2>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                        <thead>
                            <tr>
                                <th class="fw-bold" style="font-size: 1.2rem;">Booking ID</th>
                                <th class="fw-bold" style="font-size: 1.2rem;">Movie</th>
                                <th class="fw-bold" style="font-size: 1.2rem;">Show</th>
                                <th class="fw-bold" style="font-size: 1.2rem;">Theater</th>
                                <th class="fw-bold" style="font-size: 1.2rem;">Seats</th>
                                <th class="fw-bold" style="font-size: 1.2rem;">Amount</th>
                                <th class="fw-bold" style="font-size: 1.2rem;">Status</th>
                            </tr>
                        </thead>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td class="p-3"><?php echo $row['booking_id']; ?></td>
                                <td class="p-3"><?php echo $row['title']; ?></td>
                                <td class="p-3"><?php echo $row['show_date'] . ' ' . date("h:i A", strtotime($row['show_time'])); ?></td>
                                <td class="p-3"><?php echo $row['theater_name']; ?></td>
                                <td class="p-3"><?php echo $row['seat_row'] . "-" . $row['total_seat']; ?></td>
                                <td class="p-3"><?php echo $row['amount']; ?></td>
                                <td class="p-3">
                                    <?php if ($row['booking_status'] == 'Pending') { ?>
                                        <span class="p-2 text-white fw-bold rounded bg-warning text-dark">Pending</span>
                                    <?php } elseif ($row['booking_status'] == 'Approved') { ?>
                                        <span class="p-2 text-white fw-bold rounded bg-success">Approved</span>
                                    <?php } else { ?>
                                        <span class="p-2 text-white fw-bold rounded bg-danger">Cancelled</span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="container">
                            <div class="my-3">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12">
                                        <div class="alert alert-danger border border-danger text-center shadow-sm">
                                            You Have no Bookings Yet!
                                            <a href="movies.php" class="alert-link fw-bold">Book Now!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>