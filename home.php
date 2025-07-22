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
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/css/home.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- navbar -->
    <?php include 'navbar1.php'; ?>

    <!-- Hero Section -->
    <div class="container hero-con mb-3">
        <div class="hero-slider my-3">
            <div class="slider-item">
                <img src="assets/img/slider2.jpg" alt="Slider Image 2" class="img-fluid">
                <div class="overlay"></div>
            </div>
            <div class="slider-item">
                <img src="assets/img/slider3.jpg" alt="Slider Image 3" class="img-fluid">
                <div class="overlay"></div>
            </div>
        </div>
    </div>
    <hr class="mx-4">

    <!-- Movie Cards 1 -->
    <section class="container my-3 px-3">
        <h1 class="text-center fw-bold explore-title">Now Showing</h1>
        <div class="row justify-content-center mt-3">
            <div class="card-slider">
                <?php
                $movie_json = file_get_contents('assets/movies-data.json');
                $decoded_json = json_decode($movie_json, true);
                $movies = $decoded_json['movies_data'];

                foreach ($movies as $movie) {
                    $title = $movie['title'];
                    $poster = $movie['poster_url'];
                    $rating = $movie['rating'];
                    $language = $movie['language'];
                    echo '<div class="col-6 col-sm-6 col-md-4 col-lg-3">';
                    echo '    <div class="card mx-2">';
                    echo '        <img src="' . $poster . '" class="card-img-top" alt="' . $title . '">';
                    echo '        <div class="card-body">';
                    echo '            <h5 class="card-title fw-bold">' . $title . '</h5>';
                    echo '            <div class="d-flex justify-content-between align-items-center mb-3">';
                    echo '                <span><i class="fa-solid fa-star text-danger"></i> ' . $rating . '/10.0</span>';
                    echo '                <span>' . $language . '</span>';
                    echo '            </div>';
                    echo '            <a href="movies-details.php" class="btn w-100">View Details</a>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Offer Section -->
    <section class="offer-section text-center my-3">
        <h1 class="fw-bold">Exclusive Offers</h1>
        <div class="img-slider mt-3">
            <div class="me-1">
                <img src="assets/img/offer2.png" alt="Exclusive Offers..." class="offer-img img-fluid">
            </div>
            <div class="ms-1">
                <img src="assets/img/offer3.png" alt="Exclusive Offers..." class="offer-img img-fluid">
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section m-4 p-3 bg-light">
        <div class="container">
            <h1 class="text-center fw-bold mb-4">What Our Users Say</h1>
            <div class="row justify-content-center">
                <!-- Testimonial 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <p class="card-text">"CineBook makes booking movie tickets so easy and convenient. I love
                                the clean interface and great deals!"</p>
                            <div class="d-flex align-items-center mt-3">
                                <img src="https://i.pravatar.cc/50?img=1" alt="User 1" class="rounded-circle me-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Amit Shah</h6>
                                    <small class="text-muted">Movie Enthusiast</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <p class="card-text">"I’ve never missed a premiere since using CineBook. The offers and
                                reminders are a huge plus!"</p>
                            <div class="d-flex align-items-center mt-3">
                                <img src="https://i.pravatar.cc/50?img=2" alt="User 2" class="rounded-circle me-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Riya Mehta</h6>
                                    <small class="text-muted">Cinema Lover</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <p class="card-text">"A seamless experience from browsing movies to booking tickets. Highly
                                recommended!"</p>
                            <div class="d-flex align-items-center mt-3">
                                <img src="https://i.pravatar.cc/50?img=3" alt="User 3" class="rounded-circle me-3">
                                <div>
                                    <h6 class="mb-0 fw-bold">Sanjay Rao</h6>
                                    <small class="text-muted">Frequent Viewer</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe Form -->
    <section class="sub-section mt-5 shadow-lg p-4 m-4 rounded">
        <div class="container">
            <h5 class="text-center mb-3">Don’t miss out!<br>Subscribe for the latest movies & exclusive offers.</h5>
            <form action="#" method="post">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 d-flex flex-md-row">
                        <input type="email" class="form-control mx-1" name="sub_email" id="sub_email" placeholder="abc@example.com" required>
                        <button type="submit" class="btn mx-1 w-md-auto">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- jQuery and Slick Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/slick.js"></script>

</body>

</html>