<?php
session_start();
require '../includes/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['booking_id'])) {
        echo "<script>alert('Invalid Request!'); window.history.back();</script>";
        exit;
    }

    $booking_id = intval($_POST['booking_id']);
    $user_id    = $_SESSION['user_id'];

    // Validate booking belongs to logged-in user
    $check_sql = "SELECT * FROM bookings WHERE booking_id = $booking_id AND user_id = $user_id";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) == 0) {
        echo "<script>alert('Unauthorized Action!');
        window.history.back();</script>";
        exit;
    }

    // Update booking status to Cancelled
    $update_sql = "UPDATE bookings SET booking_status='Cancelled' WHERE booking_id = $booking_id";

    if (mysqli_query($con, $update_sql)) {
        session_start();
        $_SESSION['popup_type'] = "booking_cancel";
        header("Location: ../my-booking.php");
        exit();
    } else {
        echo "<script>
            alert('Failed to Cancel Booking!! Try Again Later!!');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>alert('Invalid Access!!'); window.location.href='../my-booking.php';</script>";
}
