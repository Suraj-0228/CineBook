<?php
session_start();
require '../includes/dbconnection.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please, Login First!!'); window.location='../login.php';</script>";
    exit;
}

$user_id        = (int) $_SESSION['user_id'];
$movie_id       = $_POST['movie_id'] ?? '';
$show_id        = $_POST['show_id'] ?? '';
$seat_row_raw   = $_POST['seatRow'] ?? '';
$seat_row       = mysqli_real_escape_string($con, $seat_row_raw);

// Derive total_seat from the string itself
$seats_array = array_filter(array_map('trim', explode(',', $seat_row_raw)));
$total_seat  = count($seats_array);

$payment_method = $_POST['payment_method'] ?? '';
$booking_date   = $_POST['booking_date'] ?? '';

$movie_id       = mysqli_real_escape_string($con, $movie_id);
$show_id        = mysqli_real_escape_string($con, $show_id);
$seat_row       = mysqli_real_escape_string($con, $seat_row);
$payment_method = mysqli_real_escape_string($con, $payment_method);
$booking_date   = mysqli_real_escape_string($con, $booking_date);

if (empty($movie_id) || empty($show_id) || empty($seat_row) || $total_seat <= 0 || empty($payment_method) || empty($booking_date)) {
    echo "<script>alert('Please fill all required details!'); window.history.back();</script>";
    exit;
}


if (!strtotime($booking_date)) {
    echo "<script>alert('Invalid Booking Date!'); window.history.back();</script>";
    exit;
}

$price_query = "
    SELECT t.ticket_price, s.movie_id 
    FROM theaters t
    JOIN showtimes s ON t.theater_id = s.theater_id
    WHERE s.show_id = '$show_id'
";

$price_result = mysqli_query($con, $price_query);

if (!$price_result || mysqli_num_rows($price_result) == 0) {
    echo "<script>alert('Invalid Show Selection!'); window.history.back();</script>";
    exit;
}

$data = mysqli_fetch_assoc($price_result);
$ticket_price = (float) $data['ticket_price'];
$movie_id = $data['movie_id'];
$amount = $ticket_price * $total_seat;
$insert_booking = "
    INSERT INTO bookings 
        (user_id, movie_id, show_id, seat_row, total_seat, ticket_price, amount, booking_status, booking_date)
    VALUES 
        ('$user_id', '$movie_id', '$show_id', '$seat_row', '$total_seat', '$ticket_price', '$amount', 'Pending', '$booking_date')
";

if (mysqli_query($con, $insert_booking)) {

    $booking_id = mysqli_insert_id($con);
    $payment_status = ($payment_method === 'Cash') ? 'Pending' : 'Confirmed';
    $payment_message = '';
    $insert_payment = "
        INSERT INTO payments (booking_id, payment_method, payment_status)
        VALUES ('$booking_id', '$payment_method', '$payment_status')
    ";

    if (mysqli_query($con, $insert_payment)) {
        if ($payment_method === 'UPI' || $payment_method === 'Card') {
            echo "<script>
                    alert('Your Booking has been Confirmed.');
                    window.location='../my-booking.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Booking Submitted Successfully.\\nPlease Pay ₹{$amount} within 1 hour at the Counter to Confirm.');
                    window.location='../my-booking.php';
                  </script>";
        }
    } else {
        echo "<script>alert('Payment Saving Failed: " . addslashes(mysqli_error($con)) . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Booking Saving Failed: " . addslashes(mysqli_error($con)) . "'); window.history.back();</script>";
}

mysqli_close($con);
