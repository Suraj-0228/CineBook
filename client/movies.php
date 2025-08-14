<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Movies Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/movies.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Search & Filter Section -->
    <div class="container py-3 px-0">
        <div class="row justify-content-center mx-2">
            <div class="col-12 col-md-10">
                <form class="d-flex">
                    <input class="form-control me-2 custom-search-input" type="search" placeholder="Search for Movies..." aria-label="Search">
                    <button class="btn custom-search-btn" type="submit">Search</button>
                </form>
            </div>
            <div class="col-12 col-md-10 d-flex justify-content-start flex-wrap gap-2 mt-2">
                <div class="dropdown">
                    <button class="btn fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Language
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Hindi</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Genre
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Drama & Comedy</a></li>
                        <li><a class="dropdown-item" href="#">Horror</a></li>
                        <li><a class="dropdown-item" href="#">Animation</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="custom-hr">
    </div>

    <!-- Future Card -->
    <section class="py-2 px-2">
        <div class="container">
            <a href="#" class="future-link">
                <div class="card p-3 d-flex flex-row align-items-center justify-content-between shadow border-0">
                    <h2 class="fw-bold ms-2 mt-1 fs-4 fs-md-3">Upcoming Movies</h2>
                    <i class="fa-solid fa-arrow-right fa-lg me-3"></i>
                </div>
            </a>
        </div>
    </section>

    <!-- Movie Cards Section -->
    <section class="container p-2 mb-2">
        <h1 class="text-center py-2 fw-bold">Explore All Movies...</h1>
        <div class="container">
            <div class="row justify-content-center">
                <?php
                require 'includes/dbconnection.php';

                $sql_query = "select * from movies_details";
                $result = mysqli_query($con, $sql_query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['movie_id'];
                    $title = $rows['title'];
                    $poster = $rows['poster_url'];
                    $rating = $rows['rating'];
                    $language = $rows['language'];

                    echo '<div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-3 movies-card">';
                    echo '    <div class="card">';
                    echo '          <a href="movies-details.php?id=' . $id . '">
                                        <img src="' . $poster . '" class="card-img-top" alt="' . $title . '">
                                    </a>';
                    echo '        <div class="card-body">';
                    echo '            <h5 class="card-title fw-bold">' . $title . '</h5>';
                    echo '            <div class="d-flex justify-content-between align-items-center mb-3">';
                    echo '                <span><i class="fa-solid fa-star text-danger"></i> ' . $rating . '/10.0</span>';
                    echo '                <span class="text-muted">' . $language . '</span>';
                    echo '            </div>';
                    echo '            <a href="movies-details.php?id=' . $id . '" class="btn w-100">View Details</a>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="catagory-section p-4 pt-0">
        <h1 class="text-center explore-title fw-bold">Explore By Category</h1>
        <div class="row justify-content-center">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
                <div class="text-center shadow-lg border rounded p-2 h-100 d-flex flex-column align-items-center">
                    <a href="#" class="img-link d-block">
                        <img src="assets/img/comedy.png" alt="Comedy" class="img-fluid rounded-circle">
                        <p class="catagory-text mt-2 mb-0">Comedy</p>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
                <div class="text-center shadow-lg border rounded p-2 h-100 d-flex flex-column align-items-center">
                    <a href="#" class="img-link d-block">
                        <img src="assets/img/horror.png" alt="Horror" class="img-fluid rounded-circle">
                        <p class="catagory-text mt-2 mb-0">Horror</p>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
                <div class="text-center shadow-lg border rounded p-2 h-100 d-flex flex-column align-items-center">
                    <a href="#" class="img-link d-block">
                        <img src="assets/img/thriller.png" alt="Thriller" class="img-fluid rounded-circle">
                        <p class="catagory-text mt-2 mb-0">Thriller</p>
                    </a>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3">
                <div class="text-center shadow-lg border rounded p-2 h-100 d-flex flex-column align-items-center">
                    <a href="#" class="img-link d-block">
                        <img src="assets/img/action.png" alt="Action" class="img-fluid rounded-circle">
                        <p class="catagory-text mt-2 mb-0">Action</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- jQuery and Slick Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/slick.js"></script>

</body>

</html>