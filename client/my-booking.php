<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    echo "<script>alert('Please login to view your bookings.'); window.location.href = 'login.php';</script>";
    exit();
}

require 'includes/dbconnection.php';

// Get logged-in user's ID
$user_id = $_SESSION['user_id'];

// Fetch bookings for this user
$query = "SELECT booking_id, movie_title, show_date, show_time, tickets, payment_method, payment_status
          FROM booking WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- <div class="container py-4 px-2">
        <div class="booking-not-found p-4 mx-3 p-md-5 d-flex flex-column justify-content-center align-items-center text-center shadow-lg rounded">
            <h1 class="fw-bold text-danger mb-4">No Bookings Found Yet...</h1>
            <a href="movies.php" class="book-btn btn btn-outline-dark">Book Now</a>
        </div>
    </div> -->

    <!-- Display Booking Details -->
    <div class="container my-4">
        <div class="card-header rounded py-2 justify-content-center">
            <h2 class="text-center fw-bold mt-1">My Bookings</h2>
        </div>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $booking_id = $rows['booking_id'];
                $movie_title = $rows['movie_title'];
                $show_date = $rows['show_date'];
                $show_time = $rows['show_time'];
                $payment_method = $rows['payment_method'];
                $payment_status = $rows['payment_status'];

                // Set text color based on payment status
                $statusClass = '';
                if (strtolower($payment_status) === 'pending') {
                    $statusClass = 'text-danger fw-bold'; // Red & bold
                } elseif (strtolower($payment_status) === 'confirmed' || strtolower($payment_status) === 'paid') {
                    $statusClass = 'text-success fw-bold'; // Green & bold
                }

                echo "<div class='card shadow my-3'>";
                echo "  <div class='row g-0 align-items-center border-0'>";
                echo "      <div class='col-12 col-md-8'>";
                echo "          <div class='card-body'>";
                echo "              <p class='mb-1'><strong>Booking ID:</strong> $booking_id</p>";
                echo "              <p class='mb-1'><strong>Movie Title:</strong> $movie_title</p>";
                echo "              <p class='mb-1'><strong>Show Date:</strong> $show_date</p>";
                echo "              <p class='mb-1'><strong>Show Time:</strong> $show_time</p>";
                echo "              <p class='mb-1'><strong>Payment Method:</strong> $payment_method</p>";
                echo "              <p class='mb-1'><strong>Payment Status:</strong> <span class='$statusClass'>$payment_status</span></p>";
                echo "          </div>";
                echo "      </div>";
                echo "  </div>";
                echo "</div>";
            }
        } else {
            echo '<div class="my-3">';
            echo '    <div class="row justify-content-center">';
            echo '        <div class="col-12 col-md-12">';
            echo '            <div class="alert alert-danger border border-danger text-center shadow-sm">';
            echo '                You Have no Bookings Yet! ';
            echo '                <a href="movies.php" class="alert-link fw-bold">Book Now!</a>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>