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
    <title>CineBook - Movies-Details Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/details.css">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Details Section -->
    <?php

    require 'includes/dbconnection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id']; //Get Movies id from Database

        //Fetching Movies Details from Database
        $sql_query = "select * from movies_details where movie_id = '$id'";
        $result = mysqli_query($con, $sql_query);

        if ($rows = mysqli_num_rows($result) > 0) {
            $movies = mysqli_fetch_assoc($result);

            // Stored All DEtails in Variables
            $id = $movies['movie_id'];
            $title = $movies['title'];
            $language = $movies['language'];
            $release_date = $movies['release_date'];
            $genre = $movies['genre'];
            $rating = $movies['rating'];
            $poster = $movies['poster_url'];
            $description = $movies['description'];

            // Fetch Cast Details
            $cast_query = "SELECT actor_name, role_name FROM cast_details WHERE movie_id = '$id'";
            $cast_result = mysqli_query($con, $cast_query);

            $cast_list = [];
            while ($row = mysqli_fetch_assoc($cast_result)) {
                $cast_list[] = $row;
            }
        }
    } else {
        echo "<script>alert('Invalid Movies ID!!!');</script>";
    }

    ?>

    <section class="movies-section">
        <div class="container p-4 pb-0">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <img src="<?php echo $poster ?>" alt="<?php echo $title ?>" class="img-fluid details-img rounded mb-3 mb-md-0">
                </div>
                <div class="col-md-9">
                    <h1 class="movie-title fw-bold"><?php echo $title ?></h1>
                    <div class="movie-rate d-flex align-items-center my-2">
                        <div class="rate-icon">
                            <i class="fa fa-star text-danger"></i> <?php echo $rating ?>/10
                        </div>
                        <a href="#" class="btn btn-sm mx-5">Rate Now</a>
                    </div>
                    <p><strong>Languages:</strong> <?php echo $language ?></p>
                    <p><strong>Duration:</strong> 2h 15m || <?php echo $genre ?> || <?php echo $release_date ?></p>
                    <a href="booking.php?movie_id=<?php echo $id; ?>" class="btn btn-lg">Book Ticket</a>
                </div>
            </div>
            <hr class="w-100 border border-dark">
        </div>
    </section>
    
    <!-- About Section -->
    <section class="about-section">
        <div class="container p-4 py-0">
            <div class="my-4">
                <h3 class="fw-bold">Description:</h3>
                <p> <?php echo $description ?></p>
            </div>
            <hr class="w-100 border border-dark">
            <div class="row g-3 justify-content-center m-5">
                <h1 class="fw-bold">Movie Cast:</h1>
                <?php foreach ($cast_list as $cast) { ?>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm text-center h-100">
                            <div class="card-body">
                                <!-- Optional actor image -->
                                <img src="<?= $cast['actor_image'] ?? 'assets/img/action.png' ?>"
                                    alt="<?= $cast['actor_name'] ?>"
                                    class="img-fluid rounded-circle mb-3"
                                    style="width: 90px; height: 90px; object-fit: cover;">

                                <h6 class="fw-bold text-dark mb-1"><?= $cast['actor_name'] ?></h6>
                                <?php if (!empty($cast['role_name'])) { ?>
                                    <small class="text-muted">as <?= $cast['role_name'] ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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