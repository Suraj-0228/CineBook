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
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/details.css">
</head>

<body>

    <!-- navbar -->
    <?php include 'navbar1.php'; ?>

    <!-- Details Section -->
    <section class="movies-section">
        <div class="container p-4 pb-0">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img src="assets/img/movie1.jpg" alt="Movie1...." class="img-fluid rounded mb-3 mb-md-0">
                </div>
                <div class="col-md-9">
                    <h1 class="movie-title fw-bold">Movie: Jawan</h1>
                    <div class="movie-rate d-flex align-items-center my-2">
                        <div class="rate-icon">
                            <i class="fa fa-star text-danger"></i> 7.6/10
                        </div>
                        <a href="#" class="btn btn-sm mx-5">Rate Now</a>
                    </div>
                    <p><strong>Languages:</strong> English, Hindi</p>
                    <p><strong>Duration:</strong> 2h 15m || Action || 10 Oct, 2022</p>
                    <a href="booking.php" class="btn btn-lg">Book Ticket</a>
                </div>
            </div>
            <hr class="w-100">
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container p-4 py-0">
            <div class="my-4">
                <h3 class="fw-bold">About This Movie:</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum veritatis, quod ducimus porro distinctio, ad eos quis.</p>
            </div>
            <hr class="w-100">
            <div class="mb-1">
                <h3 class="fw-bold">Cast:</h3>
                <div class="row sub-cast cast-slider ms-1">
                    <div class="col-6 col-md-4 col-lg-2 cast-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Sharukh Khan</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 cast-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Salman Khan</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 cast-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Dipika Padukon</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 cast-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Prakash Raj</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 cast-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Shirinivas Rao</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 cast-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Anamika Rai</p>
                    </div>
                </div>
            </div>
            <hr class="w-100">
            <div class="mb-4">
                <h3 class="fw-bold">Crew:</h3>
                <div class="row sub-crew crew-slider ms-1">
                    <div class="col-6 col-md-4 col-lg-2 crew-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Sharukh Khan</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 crew-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Salman Khan</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 crew-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Dipika Padukon</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 crew-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Prakash Raj</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 crew-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Shirinivas Rao</p>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 crew-img">
                        <img src="assets/img/comedy.png" height="100" width="110" alt="Image....">
                        <p class="fw-bold">Anamika Rai</p>
                    </div>
                </div>
            </div>
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