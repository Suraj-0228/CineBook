<?php
require 'includes/dbconnection.php'; // DB connection

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $movie_id = mysqli_real_escape_string($con, $_POST['movie_id']);
    $show_time = mysqli_real_escape_string($con, $_POST['show_time']);
    $seats = mysqli_real_escape_string($con, $_POST['seats']);
    $num_tickets = mysqli_real_escape_string($con, $_POST['num_tickets']);
    $total_amount = mysqli_real_escape_string($con, $_POST['total_amount']);
    $payment_status = mysqli_real_escape_string($con, $_POST['payment_status']);
    $payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);
    $booking_status = mysqli_real_escape_string($con, $_POST['booking_status']);

    $sql = "INSERT INTO booking (user_id, movie_id, show_time, seats, total_amount, payment_status, booking_status)
            VALUES ('$user_id', '$movie_id', '$show_time', '$seats', '$total_amount', '$payment_status', '$booking_status')";

    if (mysqli_query($con, $sql)) {
        $message = "<div class='alert alert-success'>Booking saved successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Movie Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h3 class="mb-0">🎟 Book Your Movie Ticket</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php echo $message; ?>

                        <form method="POST">
                            <!-- User ID -->
                            <div class="mb-3">
                                <label class="form-label">User ID</label>
                                <input type="number" name="user_id" class="form-control" required>
                            </div>

                            <!-- Select Movie -->
                            <div class="mb-3">
                                <label class="form-label">Select Movie</label>
                                <select name="movie_id" class="form-select" required>
                                    <option value="">-- Choose Movie --</option>
                                    <?php
                                    $movies = mysqli_query($con, "SELECT movie_id, title FROM movies_details");
                                    while ($row = mysqli_fetch_assoc($movies)) {
                                        echo "<option value='{$row['movie_id']}'>{$row['title']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Show Time -->
                            <div class="mb-3">
                                <label class="form-label">Show Date & Time</label>
                                <input type="datetime-local" name="show_time" class="form-control" required>
                            </div>

                            <!-- Seats -->
                            <div class="mb-3">
                                <label class="form-label">Seats (comma separated)</label>
                                <input type="text" name="seats" class="form-control" placeholder="E.g., A1,A2,A3" required>
                            </div>

                            <!-- Number of Tickets -->
                            <div class="mb-3">
                                <label class="form-label">Number of Tickets</label>
                                <input type="number" name="num_tickets" class="form-control" required>
                            </div>

                            <!-- Total Amount -->
                            <div class="mb-3">
                                <label class="form-label">Total Amount (₹)</label>
                                <input type="number" step="0.01" name="total_amount" class="form-control" required>
                            </div>

                            <!-- Payment Method -->
                            <div class="mb-3">
                                <label class="form-label">Payment Method</label>
                                <select name="payment_method" class="form-select" required>
                                    <option value="UPI">UPI</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Debit Card">Debit Card</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>

                            <!-- Payment Status -->
                            <div class="mb-3">
                                <label class="form-label">Payment Status</label>
                                <select name="payment_status" class="form-select" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Failed">Failed</option>
                                </select>
                            </div>

                            <!-- Booking Status -->
                            <div class="mb-3">
                                <label class="form-label">Booking Status</label>
                                <select name="booking_status" class="form-select" required>
                                    <option value="Pending">Pending</option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Confirm Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>