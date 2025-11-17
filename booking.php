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
    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <div class="booking-header text-center py-4">
                <h1 class="fw-bold mb-0">Book Your Tickets Now!</h1>
            </div>
            <div class="card-body p-4 bg-light">
                <form action="controllers/booking-process.php" method="post" id="bookingForm">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Movie Title:</label>
                        <input type="hidden" name="movie_id" value="<?= $movie_id; ?>">
                        <input type="text" class="form-control border-0 shadow-sm" value="<?= $movie_title; ?>" readonly>
                    </div>
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
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Select Row:</label>
                            <select class="form-select shadow-sm" name="seatRow" required>
                                <option value="">Select Row</option>
                                <?php foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $row): ?>
                                    <option value="<?= $row; ?>"><?= $row; ?></option>
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
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="ticketPrice" class="form-label fw-semibold">Ticket Price:</label>
                            <input type="number" class="form-control shadow-sm" name="ticketPrice" id="ticketPrice" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="amount" class="form-label fw-semibold">Total Amount:</label>
                            <input type="number" class="form-control shadow-sm" name="amount" id="amount" readonly>
                        </div>
                    </div>
                    <div class="mb-4 text-center">
                        <button type="button" class="bg-success px-5 py-2 text-white border border-0 rounded w-100 fw-bold px-4" data-bs-toggle="modal" data-bs-target="#paymentModal">
                            <i class="fa-solid fa-wallet me-2"></i> Pay & Book Now
                        </button>
                    </div>
                    <input type="hidden" name="payment_method" id="payment_method" required>
                </form>
            </div>

            <!-- Payment Method Modal -->
            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow-lg border-0 rounded-4">
                        <div class="modal-header payment-header text-white">
                            <h5 class="modal-title" id="paymentModalLabel"><i class="fa-solid fa-credit-card me-2"></i> Select Payment Method</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group">
                                <button type="button" class="list-group-item list-group-item-action payment-option" data-method="UPI">
                                    <i class="fa-brands fa-google-pay me-2 text-success"></i> Pay via UPI
                                </button>
                                <button type="button" class="list-group-item list-group-item-action payment-option" data-method="Card">
                                    <i class="fa-solid fa-credit-card me-2 text-primary"></i> Pay via Card
                                </button>
                                <button type="button" class="list-group-item list-group-item-action payment-option" data-method="Cash">
                                    <i class="fa-solid fa-money-bill me-2 text-success"></i> Cash at Counter
                                </button>
                            </div>
                            <div id="upiForm" class="payment-form mt-4 d-none text-center">
                                <p class="fw-semibold mb-2">Scan the QR Code Below to Pay:</p>
                                <img src="assets/img/QR Scanner.jpg" alt="UPI QR Code" class="img-fluid rounded shadow-sm border mb-3" style="max-width: 180px;">
                                <p class="text-muted mb-3">Or Enter Your UPI ID Manually:</p>
                                <input type="text" class="form-control mb-3" id="upiIdInput" placeholder="example@upi">
                                <button type="button" class="bg-success px-5 py-2 text-white border border-0 rounded w-100 fw-bold" id="upiPayBtn">
                                    Pay Now</span>
                                </button>
                            </div>
                            <div id="cardForm" class="payment-form d-none mt-4">
                                <input type="text" class="form-control mb-2" id="cardNumberInput" placeholder="Card Number (16 digits)">
                                <input type="text" class="form-control mb-2" id="cardHolderInput" placeholder="Card Holder Name">
                                <div class="row g-2">
                                    <div class="col">
                                        <input type="text" class="form-control mb-2" id="cardExpiryInput" placeholder="MM/YY">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control mb-2" id="cardCVVInput" placeholder="CVV">
                                    </div>
                                </div>
                                <button type="button" class="bg-success px-5 py-2 text-white border border-0 rounded w-100 fw-bold" id="cardPayBtn">
                                    Pay Now
                                </button>
                            </div>
                            <div id="cashForm" class="payment-form d-none mt-4 text-center">
                                <p class="text-muted mb-3">Please pay the cash amount at the counter within 1 hour to confirm your booking.</p>
                                <button type="button" class="bg-danger px-5 py-2 text-white border border-0 rounded w-100 fw-bold" id="cashConfirmBtn">
                                    Confirm Cash Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/booking.js"></script>

</body>

</html>