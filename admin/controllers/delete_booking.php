<?php

require '../includes/dbconnection.php';

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    $sql_query = "delete from booking where booking_id = '$booking_id'";
    $result = mysqli_query($con, $sql_query);

    if (mysqli_affected_rows($con) > 0) {
        echo "<script>
                alert('Booking Deleted Successfully.');
                window.location.href = '../manage_bookings.php';
            </script>";
        exit();
    }
}
