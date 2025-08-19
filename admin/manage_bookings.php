<?php
session_start();
require 'includes/dbconnection.php';

// Update status if action clicked
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['action'] == 'approve' ? 'Approved' : 'Cancelled';
    mysqli_query($con, "UPDATE bookings SET booking_status='$status' WHERE booking_id='$id'");
    header("Location: manage_bookings.php");
    exit;
}

$query = "SELECT b.*, u.username, m.title, s.show_date, s.show_time, t.theater_name FROM bookings b
          JOIN users u ON b.user_id = u.user_id
          JOIN movies_details m ON b.movie_id = m.movie_id
          JOIN showtimes s ON b.show_id = s.show_id
          JOIN theaters t ON s.theater_id = t.theater_id";

$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Manage Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header1.php'; ?>

    <!-- Manage All Bookings -->
    <section class="container my-5">
        <h1 class="fw-bold mb-3">Manage Bookings:</h1>
        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            $booking_id = $row['booking_id'];
            $username = $row['username'];
            $movie_title = $row['title'];
            $show_date = $row['show_date'];
            $show_time = $row['show_time'];
            $theater_name = $row['theater_name'];
            $seat_row = $row['seat_row'];
            $total_seat = $row['total_seat'];
            $amount = $row['amount'];
            $payment_method = $row['payment_method'];
            $booking_status = $row['booking_status'];

            echo "
            <div class='card shadow my-3'>
                <div class='row g-0 align-items-center border-0'>
                    <div class='col-12 col-md-8'>
                        <div class='card-body'>
                            <p class='mb-1'><strong>Booking ID:</strong> $booking_id</p>
                            <p class='mb-1'><strong>Username:</strong> $username</p>
                            <p class='mb-1'><strong>Movie Title:</strong> $movie_title</p>
                            <p class='mb-1'><strong>Show Date:</strong> $show_date</p>
                            <p class='mb-1'><strong>Show Time:</strong> $show_time</p>
                            <p class='mb-1'><strong>Theater Name:</strong> $theater_name</p>
                            <p class='mb-1'><strong>Seat:</strong> $seat_row - $total_seat</p>
                            <p class='mb-1'><strong>Amount:</strong> $amount</p>

                            <!-- Booking Status -->
                            <p class='mb-1'><strong>Status:</strong> ";
            if ($booking_status == 'Pending') {
                echo "<span class='p-2 text-warning fw-bold'>Pending</span>";
            } elseif ($booking_status == 'Approved') {
                echo "<span class='p-2 text-success fw-bold'>Approved</span>";
            } else {
                echo "<span class='p-2 text-danger fw-bold'>Cancelled</span>";
            }
            echo "</p>";

            // Payment Method
            echo "<p class='mb-1'><strong>Booking Method:</strong> ";
            if ($payment_method == 'UPI') {
                echo "<span class='p-2 text-success fw-bold'>$payment_method</span>";
            } elseif ($payment_method == 'Card') {
                echo "<span class='p-2 text-success fw-bold'>$payment_method</span>";
            }
            echo "</p>";

            // Action buttons only when status is Pending
            if ($booking_status == 'Pending') {
                echo "
                                <div class='btn-group mt-3'>
                                    <a href='?action=approve&id=$booking_id' class='bg-success text-white text-decoration-none rounded p-2 px-4 mx-1'>
                                        <i class='fa-solid fa-check'></i> Approve
                                    </a>
                                    <a href='?action=cancel&id=$booking_id' class='bg-danger text-white text-decoration-none rounded p-2 px-4 mx-1'>
                                        <i class='fa-solid fa-xmark'></i> Cancel
                                    </a>
                                </div>";
            }

            echo "</div>
                    </div>
                </div>
            </div>";
        } ?>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>