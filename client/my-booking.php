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
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Display Booking Details -->
    <!-- <div class="container my-4">
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
    </div> -->

    <div class="container my-5">
        <h2 class="fw-bold">My Bookings</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Movie</th>
                    <th>Show</th>
                    <th>Theater</th>
                    <th>Seats</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['booking_id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['show_date'] . ' ' . date("h:i A", strtotime($row['show_time'])); ?></td>
                        <td><?php echo $row['theater_name']; ?></td>
                        <td><?php echo $row['seat_row'] . "-" . $row['total_seat']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td>
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
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>