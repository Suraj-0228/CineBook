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
</head>

<body>

    <!-- Navbar -->
    <?php require 'includes/header1.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section text-center  d-flex align-items-center justify-content-center py-5">
        <div class="container p-5 rounded-4 shadow-lg">
            <h1 class="fw-bold mb-3 ">Experience Seamless Movie Ticket Booking!</h1>
            <p class=" fs-5 mb-4">Fast • Easy • Reliable — Book Anytime, Anywhere.</p>
            <a href="login.php" class="btn btn-lg fw-semibold px-4 py-2 shadow-sm">
                Book Now
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5 text-center">
        <div class="container">
            <h2 class="fw-bold mb-5 text-white">Our Features</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-success border-0 h-100 p-4 shadow-sm hover-card">
                        <i class="fa fa-film fs-1  mb-3"></i>
                        <h4 class="fw-bold">Latest Releases</h4>
                        <p class="fs-6 text-secondary">Stay updated with the newest and upcoming blockbusters.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-primary border-0 h-100 p-4 shadow-sm hover-card">
                        <i class="fa fa-mobile-screen-button fs-1  mb-3"></i>
                        <h4 class="fw-bold">Mobile Friendly</h4>
                        <p class="fs-6 text-secondary">Book your tickets easily from any device — anytime, anywhere.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-danger border-0 h-100 p-4 shadow-sm hover-card">
                        <i class="fa fa-credit-card fs-1  mb-3"></i>
                        <h4 class="fw-bold">Secure Payments</h4>
                        <p class="fs-6 text-secondary">Enjoy fast and secure transactions using trusted gateways.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section (Newly Added) -->
    <section class="how-it-works-section py-5 bg-light text-center">
        <div class="container">
            <h2 class="fw-bold mb-5 text-dark">How It Works</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="fa fa-search fs-1 text-success mb-3"></i>
                        <h5 class="fw-bold">Browse Movies</h5>
                        <p>Explore the latest films and find your favorites by genre or rating.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="fa fa-ticket fs-1 text-primary mb-3"></i>
                        <h5 class="fw-bold">Choose Your Seats</h5>
                        <p>Select your preferred seats with our real-time theater layout view.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100">
                        <i class="fa fa-bolt fs-1 text-danger mb-3"></i>
                        <h5 class="fw-bold">Book Instantly</h5>
                        <p>Confirm your show and pay securely in seconds — all set for movie time!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section my-5 text-center">
        <div class="container shadow-lg p-5 rounded-4" style="background-color: #19589c;">
            <h2 class="mb-3 fw-bold text-white">Get in Touch</h2>
            <p class="fs-5 text-white">
                Need help or have questions?
                Email us at
                <a href="mailto:cinebookmovies@gmail.com" class="text-white fw-semibold">
                    cinebookmovies@gmail.com
                </a>
            </p>
        </div>
    </section>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>