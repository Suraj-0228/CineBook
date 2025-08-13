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
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header1.php'; ?>

    <!-- Hero Section -->
    <section class="container my-5">
        <h1 class="fw-bold mb-4">Admin Dashboard:</h1>
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card dashboard-card shadow h-100 text-center">
                    <div class="card-body p-5 pb-4 d-flex flex-column align-items-center justify-content-center">
                        <i class="fa fa-film fa-2xl text-primary mb-4"></i>
                        <span class="fs-3 fw-bold">Total Movies</span>
                        <p class="mt-2 mb-0 fs-5"><strong>16</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card dashboard-card shadow h-100 text-center">
                    <div class="card-body p-5 pb-4 d-flex flex-column align-items-center justify-content-center">
                        <i class="fa fa-ticket fa-2xl text-success mb-4"></i>
                        <span class="fs-3 fw-bold">Total Bookings</span>
                        <p class="mt-2 mb-0 fs-5"><strong>127</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card dashboard-card shadow h-100 text-center">
                    <div class="card-body p-5 pb-4 d-flex flex-column align-items-center justify-content-center">
                        <i class="fa fa-user fa-2xl text-danger mb-4"></i>
                        <span class="fs-3 fw-bold">Total Users</span>
                        <p class="mt-2 mb-0 fs-5"><strong>79</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Bookings -->
    <section class="container">
        <h2 class="fw-bold">Recent Bookings:</h2>
        <div class="table-responsive">
            <table class="table table-bordered my-3">
                <tr>
                    <th>Booking ID</th>
                    <th>Movies Name</th>
                    <th>User Name</th>
                    <th>Date & Time</th>
                    <th>Seats</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>01</td>
                    <td>Jawaan</td>
                    <td>Suraj Manani</td>
                    <td>28/02/2025</td>
                    <td>5</td>
                    <td class="text-success">Confirmed</td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Jawaan</td>
                    <td>Suraj Manani</td>
                    <td>28/02/2025</td>
                    <td>5</td>
                    <td class="text-danger">Cancelled</td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>Jawaan</td>
                    <td>Suraj Manani</td>
                    <td>28/02/2025</td>
                    <td>5</td>
                    <td class="text-success">Confirmed</td>
                </tr>
                <tr>
                    <td>04</td>
                    <td>Jawaan</td>
                    <td>Suraj Manani</td>
                    <td>28/02/2025</td>
                    <td>5</td>
                    <td class="text-danger">Cancelled</td>
                </tr>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>