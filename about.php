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
    <section class="about-section py-5 bg-light text-dark">
        <div class="container">
            <!-- About CineBook -->
            <div class="row align-items-center mb-5">
                <div class="col-12 col-md-7">
                    <h2 class="fw-bold mb-3 text-uppercase">About CineBook</h2>
                    <p class="lead">
                        CineBook is your ultimate digital companion for seamless movie ticket booking.
                        Built with simplicity and speed in mind, CineBook offers a smooth experience to help you browse movies,
                        select your seats, and book tickets instantly — all in just a few taps or clicks.
                        Whether it’s a weekend plan with friends or a spontaneous movie night, CineBook is always ready to serve.
                    </p>
                </div>
                <div class="col-12 col-md-5 text-center mt-4 mt-md-0">
                    <h1 class="display-5 fw-bold  border border-dark rounded py-3 shadow-sm bg-white">
                        CineBook
                    </h1>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <!-- Mission -->
            <div class="mb-5">
                <h2 class="fw-bold mb-3 text-uppercase">Our Mission</h2>
                <p class="lead">
                    At CineBook, our mission is to redefine the way people experience cinema.
                    We aim to make movie ticket booking more accessible, faster, and more enjoyable for everyone.
                    By combining user-friendly design with real-time seat availability and secure transactions,
                    we strive to make your movie journey effortless and exciting from start to finish.
                </p>
            </div>
            <hr class="border-secondary my-4">
            <!-- Platform Highlights -->
            <div class="mb-5">
                <h2 class="fw-bold mb-3 text-uppercase">Platform Highlights</h2>
                <div class="table-responsive">
                    <table class="table table-hover align-middle border">
                        <tbody>
                            <tr>
                                <th scope="row" class="w-25 ">Instant Ticket Booking</th>
                                <td>No more long queues or complex apps — book in seconds.</td>
                            </tr>
                            <tr>
                                <th scope="row" class="">Live Seat Selection</th>
                                <td>View available seats and choose exactly where you want to sit.</td>
                            </tr>
                            <tr>
                                <th scope="row" class="">Mobile Friendly</th>
                                <td>Fully responsive design for smooth booking on any device.</td>
                            </tr>
                            <tr>
                                <th scope="row" class="">Secure Payments</th>
                                <td>Fast and protected transactions using trusted gateways.</td>
                            </tr>
                            <tr>
                                <th scope="row" class="">Exclusive Offers</th>
                                <td>Enjoy discounts and festive deals you won’t find elsewhere.</td>
                            </tr>
                            <tr>
                                <th scope="row" class="">Upcoming Releases</th>
                                <td>Stay updated with what’s hitting theaters soon.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <!-- Contact & Support -->
            <div>
                <h2 class="fw-bold mb-3 text-uppercase">Contact & Support</h2>
                <div class="table-responsive">
                    <table class="table table-striped align-middle border">
                        <tbody>
                            <tr>
                                <th scope="row" class="w-25 ">Email</th>
                                <td>cinebookmovies@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row" class="">Contact</th>
                                <td>+91 63594 21359</td>
                            </tr>
                            <tr>
                                <th scope="row" class="">Contact Form</th>
                                <td>We will provide you a contact form on the platform very soon.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>