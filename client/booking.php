<!-- If user is not Logged In to Website -->
<?php
session_start();

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

<!-- Calling Required File -->
<?php require 'controllers/booking-process.php'; ?>

<!-- Operate the Operation -->
<?php
require 'includes/dbconnection.php';

// Check if movie_id is passed from details.php
$movie_id = isset($_GET['movie_id']) ? intval($_GET['movie_id']) : 0;
$movie_title = "";

// Fetch movie title from DB
if ($movie_id > 0) {
    $result = mysqli_query($con, "SELECT title FROM movies_details WHERE movie_id = '$movie_id'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $movie_title = $row['title'];
    }
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
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label for="movietitle" class="form-label fw-bold">Movie Title:</label>
                                <input type="hidden" name="movietitle" value="<?php echo $movie_id; ?>">
                                <input type="text" class="form-control" value="<?php echo $movie_title; ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="moviedate" class="form-label fw-bold">Movie Date:</label>
                                <input type="date" class="form-control" name="moviedate" id="moviedate">
                            </div>

                            <div class="mb-3">
                                <label for="movietime" class="form-label fw-bold">Movie Time:</label>
                                <input type="time" class="form-control" name="movietime" id="movietime">
                            </div>

                            <div class="mb-3">
                                <label for="ticket" class="form-label fw-bold">Total Tickets:</label>
                                <input type="number" class="form-control" name="ticket" id="ticket" placeholder="Enter Total Tickets...">
                            </div>

                            <div class="mb-3">
                                <label for="paymentmethod" class="form-label fw-bold">Payment Method:</label>
                                <select class="form-select" name="paymentmethod" id="paymentmethod">
                                    <option value="selectmethod">Select Payment Method</option>
                                    <option value="UPI">UPI</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="paymentstatus" class="form-label fw-bold">Payment Status:</label>
                                <select class="form-select" name="paymentstatus" id="paymentstatus">
                                    <option value="selectstatus">Select Payment Status</option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>

                            <div class="d-grid mt-2">
                                <button type="submit" class="btn">Pay To Proceed</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/booking-process.js"></script>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>