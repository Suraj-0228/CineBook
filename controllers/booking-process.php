<?php
session_start();
require '../includes/dbconnection.php';

// If user not logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location='../login.php';</script>";
    exit;
}

// Collect data from form
$user_id       = $_SESSION['user_id'];
$movie_id      = $_POST['movie_id'];
$show_id       = $_POST['show_id'];
$seatRow       = $_POST['seatRow'];
$totalSeat     = $_POST['totalSeat'];
$ticketPrice   = $_POST['ticketPrice'];
$amount        = $_POST['amount'];
$paymentMethod = $_POST['payment_method'];

if (!empty($seatRow) && !empty($totalSeat) && !empty($paymentMethod)) {
    // Insert booking
    $sql = "INSERT INTO bookings (user_id, movie_id, show_id, seat_row, total_seat, ticket_price, amount, payment_method, booking_status) 
        VALUES ('$user_id', '$movie_id', '$show_id', '$seatRow', '$totalSeat', '$ticketPrice', '$amount', '$paymentMethod', 'Pending')";

    if (mysqli_query($con, $sql)) {
        if ($paymentMethod === "Cash") {
            echo "<script>
            alert('Booking Request Submitted!! \\nWe will Approve Your Request Very Soon. \\nPlease, Pay Your Cash Amount within 1 hour. Otherwise we will Cancel Your Booking.');
            window.location='../my-booking.php';
        </script>";
        } else {
            echo "<script>
            alert('Booking Request Submitted!!\\nWe will Approve Your Request Very Soon.');
            window.location='../my-booking.php';
        </script>";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "<script>alert('ERROR: Please, Enter All the Details!!!');</script>";
}
