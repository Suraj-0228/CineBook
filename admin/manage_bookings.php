<?php
session_start();

// If session not set but cookie exists, restore session
if (!isset($_SESSION['adminname']) && isset($_COOKIE['adminname'])) {
    $_SESSION['adminname'] = $_COOKIE['adminname'];
}

// If neither session nor cookie, redirect to login
if (!isset($_SESSION['adminname'])) {
    echo "<script>
        alert('Please, Login to Access CineBook Admin');
        window.location.href = 'admin_login.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Manage Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header1.php'; ?>

    <!-- Display Bookings Details -->
    <div class="container my-3">
        <h1 class="fw-bold">Manage Bookings:</h1>
        <?php
        require 'includes/dbconnection.php';

        // Fetch bookings for this user
        $sql_query = "SELECT * FROM booking";
        $result = mysqli_query($con, $sql_query);
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
                echo "              <div class='btn-group mt-3'>";
                echo "                  <a href='controllers/delete_booking.php?booking_id=$booking_id' class='bg-danger text-white rounded p-2 px-4 mx-1'>";
                echo "                      <i class='fa-solid fa-trash'></i>";
                echo "                  </a>";
                echo "              </div>";
                echo "          </div>";
                echo "      </div>";
                echo "  </div>";
                echo "</div>";
            }
        }
        ?>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>