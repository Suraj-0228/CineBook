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
    <!-- 🎟️ Booking Section -->
    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <!-- Header -->
            <div class="booking-header text-center py-4">
                <h1 class="fw-bold mb-0">Book Your Tickets Now!</h1>
            </div>
            <!-- Body -->
            <div class="card-body p-4 bg-light">
                <form action="controllers/booking-process.php" method="post">
                    <!-- Movie Title -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Movie Title:</label>
                        <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
                        <input
                            type="text"
                            class="form-control border-0 shadow-sm"
                            value="<?php echo $movie_title; ?>"
                            readonly>
                    </div>
                    <!-- Show Selection -->
                    <div class="mb-4">
                        <label for="show_id" class="form-label fw-semibold">Select Show:</label>
                        <select class="form-select shadow-sm" name="show_id" id="show_id" required>
                            <option value="">Select Date, Time & Theater</option>
                            <?php foreach ($shows as $show) {
                                $selected = ($selected_show_id == $show['show_id']) ? 'selected' : '';
                                $show_data = $show['show_date'] . ' || ' . date("h:i A", strtotime($show['show_time'])) . ' || ' . $show['theater_name'] . ' (' . $show['theater_location'] . ')';
                                echo "<option value='{$show['show_id']}' data-price='{$show['ticket_price']}' $selected>$show_data</option>";
                            } ?>
                        </select>
                    </div>
                    <!-- Seat Selection -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Select Row:</label>
                            <select class="form-select shadow-sm" name="seatRow" required>
                                <option value="">Select Row</option>
                                <?php foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $row): ?>
                                    <option value="<?php echo $row; ?>"><?php echo $row; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Total Seats:</label>
                            <select class="form-select shadow-sm" name="totalSeat" id="totalSeat" required>
                                <option value="">Select Total Seats</option>
                                <?php for ($i = 1; $i <= 10; $i++) {
                                    echo "<option value='$i'>$i</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <!-- Ticket Price & Amount -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="ticketPrice" class="form-label fw-semibold">Ticket Price:</label>
                            <input
                                type="number"
                                class="form-control shadow-sm"
                                name="ticketPrice"
                                id="ticketPrice"
                                readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="amount" class="form-label fw-semibold">Total Amount:</label>
                            <input
                                type="number"
                                class="form-control shadow-sm"
                                name="amount"
                                id="amount"
                                readonly>
                        </div>
                    </div>
                    <!-- Payment Method -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Payment Method:</label>
                        <select class="form-select shadow-sm" name="payment_method" required>
                            <option value="">Select Payment Method</option>
                            <option value="UPI">UPI</option>
                            <option value="Card">Credit / Debit Card</option>
                            <option value="Cash">Cash at Counter</option>
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg fw-bold shadow-sm">
                            Confirm & Book Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/booking.js"></script>

</body>

</html>