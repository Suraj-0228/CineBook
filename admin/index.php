<?php
session_start();
require 'includes/dbconnection.php';

// If session not set but cookie exists, restore session
if (!isset($_SESSION['adminname']) && isset($_COOKIE['adminname'])) {
    $_SESSION['adminname'] = $_COOKIE['adminname'];
}

// If neither session nor cookie, redirect to login
if (!isset($_SESSION['adminname'])) {
    echo "<script>
        alert('Please, Login to Access CineBook Admin');
        window.location.href = '../login.php';
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
</head>

<body>

    <main class="d-flex">
        <!-- Navbar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Hero Section -->
        <section class="container dashboard-section p-5">
            <div class="">
                <h1 class="fw-bold">Admin Dashboard:</h1>
                <hr class="border border-dark">
            </div>
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

                            $sql_query = "select count(*) as total_booking from bookings";
                            $result = mysqli_query($con, $sql_query);

                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                echo "<p class='mt-2 mb-0 fs-5'><strong>" . $row['total_booking'] . "</strong></p>";
                            } else {
                                echo "<p class='mt-2 mb-0 fs-5 text-danger'><strong>0</strong></p>";
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
            <!-- Recent Booking -->
            <section class="container recent-booking my-3">
                <div class="my-5">
                    <h1 class="fw-bold">Recent Bookings:</h1>
                    <hr>
                </div>

                <?php
                require 'includes/dbconnection.php';

                // Fetch the last 5 bookings
                $query = "SELECT b.*, u.username, m.title, s.show_date, s.show_time, t.theater_name FROM bookings b
                        JOIN users u ON b.user_id = u.user_id
                        JOIN movies_details m ON b.movie_id = m.movie_id
                        JOIN showtimes s ON b.show_id = s.show_id
                        JOIN theaters t ON s.theater_id = t.theater_id 
                        order by b.booking_id desc";
                $result_recent = mysqli_query($con, $query);

                if (mysqli_num_rows($result_recent) > 0) {
                    echo "
                <table class='table table-bordered table-striped table-hover align-middle shadow'>
                    <thead class='text-center'>
                        <tr>
                            <th>Booking ID</th>
                            <th>Username</th>
                            <th>Movie Title</th>
                            <th>Show Date</th>
                            <th>Show Time</th>
                            <th>Theater</th>
                            <th>Seat</th>
                            <th>Price/Ticket</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>";

                    while ($row = mysqli_fetch_assoc($result_recent)) {
                        $booking_id = $row['booking_id'];
                        $username = $row['username'];
                        $movie_title = $row['title'];
                        $show_date = $row['show_date'];
                        $show_time = $row['show_time'];
                        $theater_name = $row['theater_name'];
                        $seat_row = $row['seat_row'];
                        $total_seat = $row['total_seat'];
                        $price = $row['ticket_price'];
                        $amount = $row['amount'];
                        $booking_status = $row['booking_status'];

                        echo "
                <tr class='text-center'>
                    <td>$booking_id</td>
                    <td>$username</td>
                    <td>$movie_title</td>
                    <td>$show_date</td>
                    <td>$show_time</td>
                    <td>$theater_name</td>
                    <td>$seat_row - $total_seat</td>
                    <td>₹$price</td>
                    <td>₹$amount</td>                
                    <td>";

                        if ($booking_status == 'Pending') {
                            echo "<span class='badge bg-warning text-dark'>Pending</span>";
                        } elseif ($booking_status == 'Approved') {
                            echo "<span class='badge bg-success'>Approved</span>";
                        } else {
                            echo "<span class='badge bg-danger'>Cancelled</span>";
                        }
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p class='text-center text-muted'>No recent bookings found.</p>";
                }
                ?>
            </section>

        </section>
    </main>

</body>

</html>