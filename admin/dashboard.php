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
    <title>CineBook - Admin Dashboard</title>
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

    <!-- Hero Section -->
    <section class="container dashboard-section my-3">
        <h1 class="fw-bold mb-4">Admin Dashboard:</h1>
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card dashboard-card shadow h-100 text-center">
                    <div class="card-body p-5 pb-4 d-flex flex-column align-items-center justify-content-center">
                        <i class="fa fa-film fa-2xl text-primary mb-4"></i>
                        <span class="fs-3 fw-bold">Total Movies</span>
                        <?php
                        require 'includes/dbconnection.php';

                        $sql_query = "select count(*) as total_movies from movies_details";
                        $result = mysqli_query($con, $sql_query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            echo "<p class='mt-2 mb-0 fs-5'><strong>" . $row['total_movies'] . "</strong></p>";
                        } else {
                            echo "<p class='mt-2 mb-0 fs-5 text-danger'><strong>Error</strong></p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card dashboard-card shadow h-100 text-center">
                    <div class="card-body p-5 pb-4 d-flex flex-column align-items-center justify-content-center">
                        <i class="fa fa-ticket fa-2xl text-success mb-4"></i>
                        <span class="fs-3 fw-bold">Total Bookings</span>
                        <?php
                        require 'includes/dbconnection.php';

                        $sql_query = "select count(*) as total_booking from booking";
                        $result = mysqli_query($con, $sql_query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            echo "<p class='mt-2 mb-0 fs-5'><strong>" . $row['total_booking'] . "</strong></p>";
                        } else {
                            echo "<p class='mt-2 mb-0 fs-5 text-danger'><strong>Error</strong></p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card dashboard-card shadow h-100 text-center">
                    <div class="card-body p-5 pb-4 d-flex flex-column align-items-center justify-content-center">
                        <i class="fa fa-user fa-2xl text-danger mb-4"></i>
                        <span class="fs-3 fw-bold">Total Users</span>
                        <?php
                        require 'includes/dbconnection.php';

                        $sql_query = "select count(*) as total_user from users";
                        $result = mysqli_query($con, $sql_query);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            echo "<p class='mt-2 mb-0 fs-5'><strong>" . $row['total_user'] . "</strong></p>";
                        } else {
                            echo "<p class='mt-2 mb-0 fs-5 text-danger'><strong>Error</strong></p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Bookings -->
    <section class="container booking-section">
        <h2 class="fw-bold">Recent Bookings:</h2>
        <?php
        require 'includes/dbconnection.php';

        $sql_query = "select * from booking order by booking_id desc limit 5";
        $result = mysqli_query($con, $sql_query);

        while ($rows = mysqli_fetch_assoc($result)) {

            $booking_id = $rows['booking_id'];
            $user_id = $rows['user_id'];
            $movie_title = $rows['movie_title'];
            $show_date = $rows['show_date'];
            $show_time = $rows['show_time'];
            $tickets = $rows['tickets'];
            $payment_method = $rows['payment_method'];
            $payment_status = $rows['payment_status'];

            echo "
                        <div class='card shadow my-3'>
                            <div class='row g-0 align-items-center my-3 border-0'>
                                <div class='col-12 col-md-8'>
                                    <div class='card-body'>
                                        <p class='mb-1'><strong>Booking ID:</strong> $booking_id</p>
                                        <p class='mb-1'><strong>User ID:</strong> $user_id</p>
                                        <p class='mb-1'><strong>Movie Title:</strong> $movie_title</p>
                                        <p class='mb-1'><strong>Show Date:</strong> $show_date</p>
                                        <p class='mb-1'><strong>Show Time:</strong> $show_time</p>
                                        <p class='mb-1'><strong>Total Tickets:</strong> $tickets</p>
                                        <p class='mb-1'><strong>Payment Method:</strong> $payment_method</p>
                                        <p class='mb-1'><strong>Payment Status:</strong> $payment_status</p>
                                    </div>
                                </div>
                            </div>
                        </div>";
        } ?>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>