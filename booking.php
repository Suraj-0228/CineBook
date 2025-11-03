<?php
require 'controllers/booking-process2.php';

// If session not set but cookie exists, restore session
if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

// If neither session nor cookie, redirect to login
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Please, Login to Access CineBook');
        window.location.href = 'login.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Ticket Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Booking Form -->
    <div class="container my-4">
        <div class="card shadow">
            <div class="booking-header rounded-top p-3">
                <h1 class="text-center mt-2">Book Your Tickets Now!</h1>
            </div>
            <div class="card-body">
                <form action="controllers/booking-process.php" method="post">
                    <!-- Movie Title -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Movie Title:</label>
                        <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
                        <input type="text" class="form-control" value="<?php echo $movie_title; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="show_id" class="form-label fw-bold">Select Show:</label>
                        <select class="form-select" name="show_id" id="show_id">
                            <option value="">Select Date, Time, Theater</option>
                            <?php foreach ($shows as $show) {
                                $selected = ($selected_show_id == $show['show_id']) ? 'selected' : '';
                                $show_data = $show['show_date'] . ' || ' . date("h:i A", strtotime($show['show_time'])) . ' || ' . $show['theater_name'] . ' (' . $show['theater_location'] . ')';
                                echo "<option value='{$show['show_id']}' data-price='{$show['ticket_price']}' $selected>$show_data</option>";
                            } ?>
                        </select>
                    </div>

                    <!-- Seat Row & Total Seats -->
                    <div class="row g-2 mb-3">
                        <div class="col-md-6 col-12">
                            <label class="form-label fw-bold">Select Row:</label>
                            <select class="form-select" name="seatRow">
                                <option value="">Select Row</option>
                                <?php foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $row): ?>
                                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="form-label fw-bold">Total Seats:</label>
                            <select class="form-select" name="totalSeat" id="totalSeat">
                                <option value="">Select Total Seats</option>
                                <?php for ($i = 1; $i <= 10; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Ticket Price & Amount -->
                    <div class="mb-3">
                        <label for="ticketPrice" class="form-label fw-bold">Ticket Price:</label>
                        <input type="number" class="form-control" name="ticketPrice" id="ticketPrice" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label fw-bold">Total Amount:</label>
                        <input type="number" class="form-control" name="amount" id="amount" readonly>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Payment Method:</label>
                        <select class="form-select" name="payment_method">
                            <option value="">Select Payment Method</option>
                            <option value="UPI">UPI</option>
                            <option value="Card">Credit/Debit Card</option>
                            <option value="Cash">Cash at Counter</option>
                        </select>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/booking.js"></script>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>