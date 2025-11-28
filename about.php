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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/about.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- About Section -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-7">
                    <h2 class="fw-bold text-uppercase mb-3" style="letter-spacing: 1px;">
                        About CineBook
                    </h2>
                    <p class="lead text-secondary">
                        CineBook is your modern movie-booking companion, designed to make cinema
                        more accessible, enjoyable, and effortless. From browsing the latest movies
                        to choosing your seats and booking tickets instantly — CineBook brings a
                        fast, smooth, and secure experience right at your fingertips.
                    </p>
                </div>
                <div class="col-lg-5 text-center mt-4 mt-lg-0">
                    <div class="p-4 rounded-4 shadow-lg bg-white border border-light">
                        <h1 class="display-5 fw-bold text-primary mb-0">🎬 CineBook</h1>
                        <p class="text-muted mt-2">Your Cinema. Your Way.</p>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="mb-5">
                <h2 class="fw-bold text-uppercase mb-3">Our Mission</h2>
                <p class="lead text-secondary">
                    Our mission is to revolutionize your cinema experience by providing
                    a user-friendly, fast, and secure platform. With real-time seat selection,
                    trusted payment systems, and beautifully intuitive design, CineBook aims to
                    offer a delightful journey from choosing a movie to watching it in your
                    favorite theater.
                </p>
            </div>
            <hr class="my-4">
            <div class="mb-5">
                <h2 class="fw-bold text-uppercase mb-4">Platform Highlights</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h5 class="fw-bold"><i class="fa-solid fa-ticket text-primary me-2"></i>Instant Booking</h5>
                            <p class="text-secondary mb-0">Skip long queues and book tickets in seconds.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h5 class="fw-bold"><i class="fa-solid fa-chair text-danger me-2"></i>Live Seat Selection</h5>
                            <p class="text-secondary mb-0">Choose your preferred seats in real-time.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h5 class="fw-bold"><i class="fa-solid fa-mobile-screen-button text-success me-2"></i>Mobile Friendly</h5>
                            <p class="text-secondary mb-0">Optimized for smooth use on every device.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h5 class="fw-bold"><i class="fa-solid fa-shield-halved text-info me-2"></i>Secure Payments</h5>
                            <p class="text-secondary mb-0">Trusted gateways for quick & safe transactions.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h5 class="fw-bold"><i class="fa-solid fa-gift text-warning me-2"></i>Exclusive Offers</h5>
                            <p class="text-secondary mb-0">Special deals & festive discounts for users.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h5 class="fw-bold"><i class="fa-solid fa-film text-primary me-2"></i>Upcoming Releases</h5>
                            <p class="text-secondary mb-0">Stay updated with the latest movie arrivals.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div>
                <h2 class="fw-bold text-uppercase mb-4">Contact & Support</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h6 class="fw-bold text-primary">
                                <i class="fa-solid fa-envelope me-2"></i>Email
                            </h6>
                            <a href="#" class="text-secondary mb-0">cinebookmovies@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h6 class="fw-bold text-primary">
                                <i class="fa-solid fa-phone me-2"></i>Contact
                            </h6>
                            <p class="text-secondary mb-0">+91 63594 21359</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white shadow-lg rounded-4 h-100">
                            <h6 class="fw-bold text-primary">
                                <i class="fa-solid fa-message me-2"></i>Support
                            </h6>
                            <p class="text-secondary mb-0">
                                Contact form coming soon to help you connect faster.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>