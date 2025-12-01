<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/home.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center position-relative text-white">
        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100"></div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 text-center">
                    <p class="text-uppercase small fw-semibold mb-2 letter-spacing-1">
                        Welcome to <span class="text-warning">CineBook</span>
                    </p>
                    <h1 class="fw-bold display-4 mb-3">
                        Book Movie Tickets<br>
                        <span class="text-gradient">Anytime, Anywhere</span>
                    </h1>
                    <p class="lead mb-4">
                        Discover the latest releases, pick your favorite seats,
                        and enjoy a smooth and secure booking experience — all in just a few clicks.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                        <a href="movies.php" class="bg-success px-5 py-2 text-white border border-0 rounded fw-bold px-4 text-decoration-none">
                            <i class="fa-solid fa-film me-2"></i> Browse Movies
                        </a>
                        <a href="contact.php" class="bg-primary px-5 py-2 text-white border border-0 rounded fw-bold px-4 text-decoration-none">
                            <i class="fa-solid fa-phone me-2"></i> Contact Us
                        </a>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                        <span class="badge px-3 py-2">
                            <i class="fa-solid fa-bolt me-1"></i> Instant Booking
                        </span>
                        <span class="badge px-3 py-2">
                            <i class="fa-solid fa-chair me-1"></i> Live Seat Selection
                        </span>
                        <span class="badge px-3 py-2">
                            <i class="fa-solid fa-shield-halved me-1"></i> Secure Payments
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="mx-4 border border-dark">

    <!-- Movie Cards 1 -->
    <section class="container my-3 px-3">
        <h1 class="text-center fw-bold explore-title">Now Showing</h1>
        <div class="row justify-content-center mt-3">
            <?php
            require 'includes/dbconnection.php';

            $sql_query = "select * from movies_details limit 8";
            $result = mysqli_query($con, $sql_query);

            while ($rows = mysqli_fetch_assoc($result)) {
                $id = $rows['movie_id'];
                $title = $rows['title'];
                $poster = $rows['poster_url'];
                $rating = $rows['rating'];
                $language = $rows['language'];

                echo '
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card movie-card h-100 shadow-sm border-0">
                            <a href="movies-details.php?id=' . (int)$id . '" class="text-decoration-none">
                                <img 
                                    src="' . htmlspecialchars($poster) . '" 
                                    class="card-img-top" 
                                    alt="' . htmlspecialchars($title) . '">
                            </a>
                            <div class="card-body">
                                <h6 class="fw-bold text-dark text-truncate mb-2">
                                    ' . htmlspecialchars($title) . '
                                </h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-warning text-dark">
                                        <i class="fa-solid fa-star me-1"></i>
                                        ' . htmlspecialchars($rating) . '
                                    </span>
                                    <span class="badge bg-light text-dark">
                                        ' . htmlspecialchars($language) . '
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
        <a href="movies.php" class="explore-link text-decoration-none">
            <div class="card p-3 d-flex flex-row align-items-center justify-content-between shadow-lg border-0">
                <h2 class="fw-bold ms-2 mt-1 fs-4 fs-md-3">Explore More Movies</h2>
                <i class="fa-solid fa-arrow-right fa-lg me-3"></i>
            </div>
        </a>
    </section>

    <!-- Offer Section -->
    <section class="py-5 mt-5 offer-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-2 text-white">Exclusive CineBook Offers</h2>
                <p class="text-light mb-0">
                    Enjoy smart savings on weekend shows, festivals, and special occasions with CineBook.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow">
                        <img src="assets/img/offer1.png"
                            alt="Weekend Offers - CineBook">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary">Weekend Special</span>
                                <span class="badge bg-warning text-dark">Flat 20% Off</span>
                            </div>
                            <h5 class="card-title fw-semibold">
                                Flat 20% Off on Weekend Shows
                            </h5>
                            <p class="card-text small text-muted mb-3">
                                Make your Friday, Saturday, and Sunday nights memorable with special discounts on selected cinemas and showtimes.
                            </p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted d-block">Use Code</small>
                                    <span class="fw-bold">WEEKEND20</span>
                                </div>
                                <a href="#"
                                    class="btn btn-outline-primary btn-sm fw-semibold">
                                    View Details
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow">
                        <img src="assets/img/offer2.png"
                            alt="Festival Offers - CineBook">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary">Festive Offer</span>
                                <span class="badge bg-success">Cashback & Combos</span>
                            </div>
                            <h5 class="card-title fw-semibold">
                                Festive Cashback & Combo Offers
                            </h5>
                            <p class="card-text small text-muted mb-3">
                                Celebrate festivals with exciting cashback and snack combos on your favourite movies across partnered theaters.
                            </p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <small class="text-danger fw-semibold">
                                    Limited Time Offer
                                </small>
                                <a href="#"
                                    class="btn btn-primary btn-sm fw-semibold">
                                    Grab Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-uppercase mb-2">
                    <i class="fa-solid fa-comments me-2 text-primary"></i>What Our Users Say
                </h2>
                <p class="text-muted mb-0">Real experiences from people who love booking with CineBook.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-3">
                                <i class="fa-solid fa-quote-left text-primary fs-3 mb-2"></i>
                                <p class="card-text mb-0 text-muted">
                                    “CineBook makes booking movie tickets so easy and convenient. I love
                                    the clean interface and great deals!”
                                </p>
                            </div>
                            <div class="mt-auto d-flex align-items-center">
                                <img src="https://i.pravatar.cc/60?img=1" alt="User 1" class="rounded-circle me-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Amit Shah</h6>
                                    <small class="text-muted">Movie Enthusiast</small><br>
                                    <span class="text-warning">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-3">
                                <i class="fa-solid fa-quote-left text-primary fs-3 mb-2"></i>
                                <p class="card-text mb-0 text-muted">
                                    “I’ve never missed a premiere since using CineBook.
                                    The offers and reminders are a huge plus!”
                                </p>
                            </div>
                            <div class="mt-auto d-flex align-items-center">
                                <img src="https://i.pravatar.cc/60?img=2" alt="User 2" class="rounded-circle me-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Riya Mehta</h6>
                                    <small class="text-muted">Cinema Lover</small><br>
                                    <span class="text-warning">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 rounded-4">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-3">
                                <i class="fa-solid fa-quote-left text-primary fs-3 mb-2"></i>
                                <p class="card-text mb-0 text-muted">
                                    “A seamless experience from browsing movies to booking tickets.
                                    Highly recommended!”
                                </p>
                            </div>
                            <div class="mt-auto d-flex align-items-center">
                                <img src="https://i.pravatar.cc/60?img=3" alt="User 3" class="rounded-circle me-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Sanjay Rao</h6>
                                    <small class="text-muted">Frequent Viewer</small><br>
                                    <span class="text-warning">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="mx-4">

    <!-- Subscribe Section -->
    <section class="mb-5 mx-5">
        <div class="card sub-section shadow-lg border-0 rounded-4 bg-light p-4 p-md-5">
            <div class="row align-items-center g-4">
                <div class="col-12 col-md-6 text-center text-md-start">
                    <h4 class="fw-bold mb-2">
                        <i class="fa-solid fa-bell me-2 text-primary"></i>
                        Don’t Miss Out!
                    </h4>
                    <p class="mb-2 text-muted">
                        Get updates on the latest releases, special screenings, and exclusive CineBook offers.
                    </p>
                    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill px-3 py-2">
                        <i class="fa-solid fa-check me-1"></i> No spam. Unsubscribe anytime.
                    </span>
                </div>
                <div class="col-12 col-md-6">
                    <form action="#" method="post" class="mt-2 mt-md-0">
                        <div class="input-group">
                            <span class="input-group-text border-0 shadow-sm bg-white">
                                <i class="fa-solid fa-envelope text-primary"></i>
                            </span>
                            <input
                                type="email"
                                class="form-control border-0 shadow-sm"
                                name="sub_email"
                                id="sub_email"
                                placeholder="Enter your email address"
                                required>
                            <button
                                type="submit"
                                class="btn btn-primary fw-bold px- shadow-sm">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Success Modal -->
    <div class="modal fade" id="loginSuccessModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4">
                <div class="modal-header border-0 flex-column align-items-center pt-4 pb-2">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2"
                        style="width: 64px; height: 64px; background-color: rgba(25,88,156,0.1);">
                        <i class="fa-solid fa-circle-check text-success fa-2xl"></i>
                    </div>
                    <h4 class="fw-bold mb-0">Login Successful</h4>
                </div>
                <div class="modal-body text-center pt-2 pb-3 px-4">
                    <p class="text-muted mb-0">
                        Welcome to <span class="fw-semibold">CineBook</span>!
                        You’re now logged in — start exploring and book your favorite movies.
                    </p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button class="btn btn-primary rounded-pill px-4 fw-semibold" data-bs-dismiss="modal">
                        Continue to Home
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- jQuery and Slick Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/slick.js"></script>

    <?php if (!empty($_SESSION['popup_type']) && $_SESSION['popup_type'] == "login_success") { ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modal = new bootstrap.Modal(document.getElementById("loginSuccessModal"));
                modal.show();
            });
        </script>
    <?php unset($_SESSION['popup_type']);
    } ?>

</body>

</html>