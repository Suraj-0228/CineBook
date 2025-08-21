<?php
session_start();
require 'includes/dbconnection.php';

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

// Get movie_id from URL
$movie_id = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;
$movie_title = "";

// Fetch movie title
if ($movie_id > 0) {
    $result = mysqli_query($con, "SELECT title FROM movies_details WHERE movie_id = '$movie_id'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $movie_title = $row['title'];
    }
}

// Fetch available shows for this movie
$shows = [];
$show_query = "
    SELECT s.show_id, s.show_date, s.show_time, t.theater_name, t.theater_location, t.ticket_price
    FROM showtimes s
    JOIN theaters t ON s.theater_id = t.theater_id
    WHERE s.movie_id = '$movie_id'
    ORDER BY s.show_date, s.show_time
";
$res_shows = mysqli_query($con, $show_query);
if ($res_shows && mysqli_num_rows($res_shows) > 0) {
    while ($row = mysqli_fetch_assoc($res_shows)) {
        $shows[] = $row;
    }
}

// Handle seat selection + show selection
$amount = 0;
$ticket_price = 0;
$totalSeat = $_POST['totalSeat'] ?? 0;
$selected_show_id = $_POST['show_id'] ?? 0;

if ($selected_show_id > 0) {
    // Fetch ticket price for selected theater/show
    $price_query = "
        SELECT t.ticket_price
        FROM showtimes s
        JOIN theaters t ON s.theater_id = t.theater_id
        WHERE s.show_id = '$selected_show_id'
        LIMIT 1
    ";
    $res = mysqli_query($con, $price_query);
    if ($res && mysqli_num_rows($res) > 0) {
        $ticket_price = mysqli_fetch_assoc($res)['ticket_price'];
    }
}

// Calculate total amount
if ($ticket_price > 0 && $totalSeat > 0) {
    $amount = $ticket_price * $totalSeat;
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
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Booking Form -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-0 shadow">
                    <h1 class="booking-header rounded-top fw-bold text-center p-3">Book Your Ticket Now!</h1>
                    <div class="card-body">
                        <!-- Self-submitting form for price calculation -->
                        <form action="" method="post">
                            <!-- Movie Info -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Movie Title:</label>
                                <input type="hidden" name="movie_id" value="<?php echo $movie_id; ?>">
                                <input type="text" class="form-control" value="<?php echo $movie_title; ?>" readonly>
                            </div>
                            <!-- Show Selection -->
                            <div class="mb-3">
                                <label for="show_id" class="form-label fw-bold">Select Show:</label>
                                <select class="form-select" name="show_id" id="show_id" required onchange="this.form.submit()">
                                    <option value="">-- Select Date, Time & Theater --</option>
                                    <?php if (!empty($shows)) {
                                        foreach ($shows as $show) {
                                            $selected = ($selected_show_id == $show['show_id']) ? 'selected' : '';
                                            $show_text = $show['show_date'] . " | " . date("h:i A", strtotime($show['show_time'])) . " | " . $show['theater_name'] . " (" . $show['theater_location'] . ")";
                                            echo "<option value='{$show['show_id']}' $selected>$show_text</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No shows available</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="row g-2">
                                    <!-- Seat Row -->
                                    <div class="col-md-6 col-12">
                                        <label for="seatRow" class="form-label fw-bold">Select Row:</label>
                                        <select class="form-select" name="seatRow" id="seatRow" required>
                                            <option value="">Select Row...</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                        </select>
                                    </div>

                                    <!-- Seat Number -->
                                    <div class="col-md-6 col-12">
                                        <label for="totalSeat" class="form-label fw-bold">Select Total Seat:</label>
                                        <select class="form-select" name="totalSeat" id="totalSeat" required onchange="this.form.submit()">
                                            <option value="">Select Total Seat...</option>
                                            <?php
                                            for ($i = 1; $i <= 10; $i++) {
                                                $sel = ($totalSeat == $i) ? "selected" : "";
                                                echo "<option value='$i' $sel>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Ticket Price -->
                            <div class="mb-3">
                                <label for="ticketPrice" class="form-label fw-bold">Ticket Price:</label>
                                <input type="number" class="form-control" name="ticketPrice" id="ticketPrice" value="<?php echo $ticket_price; ?>" readonly>
                            </div>
                            <!-- Total Amount -->
                            <div class="mb-3">
                                <label for="amount" class="form-label fw-bold">Total Amount:</label>
                                <input type="number" class="form-control" name="amount" id="amount" value="<?php echo $amount; ?>" readonly>
                            </div>
                            <!-- Payment Method -->
                            <div class="mb-3">
                                <label for="payment_method" class="form-label fw-bold">Payment Method:</label>
                                <select class="form-select" name="payment_method" id="payment_method" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="UPI">UPI</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>
                            <div class="d-grid mt-2">
                                <button type="submit" formaction="controllers/booking-process.php" class="btn btn-primary">Pay To Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
