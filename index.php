<?php
session_start();

// If session not set but cookie exists, restore session
if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

// If user is already logged in, redirect to home
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Home Page</title>
    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Font Awesome & Slick Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php require 'includes/header1.php'; ?>

    <!-- Hero Section -->
    <section class="hero text-center m-4 py-3">
        <div class="container p-4 rounded shadow-lg">
            <h2 class=""><strong>Experience Seamless Movie Ticket Booking Today!</strong></h2>
            <p class="text-muted fs-4">Easy, Fast, Reliable.</p>
            <a href="login.php" class="btn">Book Now</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <h1 class="text-white"><strong>Our Features</strong></h1>
                <div class="col-md-4">
                    <div class="card h-100 mx-2 p-4">
                        <i class="fa fa-film fs-1 text-primary mb-3"></i>
                        <h4><strong>Latest Releases</strong></h4>
                        <p class="fs-5">Stay updated with new and upcoming movies.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 mx-2 p-4">
                        <i class="fa fa-phone fs-1 text-success mb-3"></i>
                        <h4><strong>Mobile Friendly</strong></h4>
                        <p class="fs-5">Book your tickets from any device with ease.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 mx-2 p-4">
                        <i class="fa fa-credit-card fs-1 text-danger mb-3"></i>
                        <h4><strong>Secure Payments</strong></h4>
                        <p class="fs-5">You can make your transaction more safely with us.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="m-4 my-5 text-center">
        <div class="container shadow-lg p-5 rounded">
            <h1 class="mb-4 fw-bold">Get in Touch</h1>
            <p class="fs-5">Need help or have questions? Email us at <a href="#">cinebookmovies@gmail.com</a></p>
        </div>
    </section>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>