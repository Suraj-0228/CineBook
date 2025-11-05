<?php
session_start();
require '../includes/dbconnection.php';

// If user not logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please, Login First!!'); window.location='../login.php';</script>";
    exit;
}

// ===== Collect form data =====
$user_id        = $_SESSION['user_id'];
$movie_id       = mysqli_real_escape_string($con, $_POST['movie_id']);
$show_id        = mysqli_real_escape_string($con, $_POST['show_id']);
$seat_row       = mysqli_real_escape_string($con, $_POST['seatRow']);
$total_seat     = (int) $_POST['totalSeat'];
$payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);

// ===== Validate mandatory fields =====
if (empty($movie_id) || empty($show_id) || empty($seat_row) || $total_seat <= 0 || empty($payment_method)) {
    echo "<script>alert('Please, Fill all Required Details!!'); window.history.back();</script>";
    exit;
}

// ===== Fetch ticket price from theaters table (JOIN with showtimes) =====
$price_query = "
    SELECT t.ticket_price 
    FROM theaters t
    JOIN showtimes s ON t.theater_id = s.theater_id
    WHERE s.show_id = '$show_id'
";
$price_result = mysqli_query($con, $price_query);

if (!$price_result || mysqli_num_rows($price_result) == 0) {
    echo "<script>alert('Invalid!! Show Selection or Missing Ticket Price!!'); window.history.back();</script>";
    exit;
}

$price_row = mysqli_fetch_assoc($price_result);
$ticket_price = (float) $price_row['ticket_price'];

// ===== Calculate total amount =====
$amount = $ticket_price * $total_seat;

// ===== Step 1: Insert into bookings table =====
$insert_booking = "
    INSERT INTO bookings (user_id, movie_id, show_id, seat_row, total_seat, ticket_price, amount, booking_status)
    VALUES ('$user_id', '$movie_id', '$show_id', '$seat_row', '$total_seat', '$ticket_price', '$amount', 'Pending')
";

if (mysqli_query($con, $insert_booking)) {
    $booking_id = mysqli_insert_id($con);

    // ===== Step 2: Handle Payment Logic =====
    $payment_status = 'Pending';
    $payment_message = '';

    if ($payment_method === 'UPI' || $payment_method === 'Card') {
        $payment_status = 'Confirmed';
    } elseif ($payment_method === 'Cash') {
        $payment_status = 'Pending';
    }

    // ===== Step 3: Insert into payments table =====
    $insert_payment = "
        INSERT INTO payments (booking_id, payment_method, payment_status, payment_message)
        VALUES ('$booking_id', '$payment_method', '$payment_status', '$payment_message')
    ";

    if (mysqli_query($con, $insert_payment)) {
        // ===== Step 4: User Message =====
        if ($payment_method === 'UPI' || $payment_method === 'Card') {
            echo "<script>
                alert('Payment Successful via {$payment_method}!\\nYour Booking is Confirmed.');
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
