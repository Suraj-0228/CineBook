<?php
session_start();

if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Please, Login to Access MovieMate!!');
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
    <title>MovieMate - Movies-Details Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/details.css">
    <link rel="shortcut icon" href="assets/img/favicon.svg" type="image/x-icon">
</head>

<body>

    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Movie Details Section -->
    <?php
    require 'includes/dbconnection.php';

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Safety

        // Fetch movie details
        $sql_query = "SELECT * FROM movies_details WHERE movie_id = '$id'";
        $result = mysqli_query($con, $sql_query);

        if (mysqli_num_rows($result) > 0) {
            $movie = mysqli_fetch_assoc($result);

            $id           = $movie['movie_id'];
            $title        = $movie['title'];
            $language     = $movie['language'];
            $release_date = $movie['release_date'];
            $genre        = $movie['genre'];
            $rating       = $movie['rating'];
            $poster       = $movie['poster_url'];
            $description  = $movie['description'];

            // Fetch cast data
            $cast_query  = "SELECT actor_name, role_name FROM cast_details WHERE movie_id = '$id'";
            $cast_result = mysqli_query($con, $cast_query);

            $cast_list = [];
            while ($row = mysqli_fetch_assoc($cast_result)) {
                $cast_list[] = $row;
            }
        } else {
            echo "<div class='container py-5'><div class='alert alert-danger text-center mb-0'>Movie not found!</div></div>";
            exit;
        }
    } else {
        echo "<script>alert('Invalid Movie ID!'); window.location.href='movies.php';</script>";
        exit;
    }
    ?>

    <!-- Back Button -->
    <section class="container py-3">
        <button type="button"
            class="btn btn-outline-secondary fw-semibold px-3 py-2"
            onclick="window.history.back()">
            <i class="fa-solid fa-arrow-left me-2"></i> Back
        </button>
    </section>

    <!-- Movie Overview Section -->
    <section class="movies-section mt-3">
        <div class="container">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body p-4 p-md-5">
                    <div class="row g-4 align-items-center">
                        <div class="col-12 col-md-4 text-center">
                            <img
                                src="<?= htmlspecialchars($poster); ?>"
                                alt="<?= htmlspecialchars($title); ?>"
                                class="img-fluid rounded-4 shadow-sm border">
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">
                                <div>
                                    <h1 class="fw-bold mb-2"><?= htmlspecialchars($title); ?></h1>
                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                        <span class="badge bg-warning text-dark d-flex align-items-center">
                                            <i class="fa-solid fa-star me-1"></i>
                                            <?= htmlspecialchars($rating); ?>/10
                                        </span>
                                        <span class="badge bg-light text-muted"><?= htmlspecialchars($language); ?></span>
                                        <span class="badge bg-light text-muted"><?= htmlspecialchars($genre); ?></span>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-primary btn-sm fw-semibold mt-2 px-3 py-2 mt-md-0">
                                    <i class="fa-solid fa-pen me-1"></i> Rate Now
                                </a>
                            </div>
                            <div class="mb-3">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <span class="fw-semibold">Language:</span>
                                        <span class="text-muted"><?= htmlspecialchars($language); ?></span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="fw-semibold">Genre:</span>
                                        <span class="text-muted"><?= htmlspecialchars($genre); ?></span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="fw-semibold">Duration:</span>
                                        <span class="text-muted">2h 15m</span>
                                    </li>
                                    <li class="mb-1">
                                        <span class="fw-semibold">Release Date:</span>
                                        <span class="text-muted"><?= htmlspecialchars($release_date); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <a href="booking.php?movie_id=<?= $id; ?>"
                                    class="btn fw-semibold px-4 py-2">
                                    <i class="fa-solid fa-ticket me-2"></i> Book Ticket
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Description Section -->
    <section class="my-5 description-section">
        <div class="container bg-white shadow-lg rounded-4 p-5">
            <h3 class="fw-bold mb-3 d-flex align-items-center">
                <i class="fa-solid fa-align-left me-2 text-primary"></i>
                Description
            </h3>
            <p class="text-muted mb-0">
                <?= nl2br(htmlspecialchars($description)); ?>
            </p>
        </div>
    </section>

    <!-- Cast Section -->
    <section class="mb-5 cast-section">
        <div class="container bg-white py-5 px-4 rounded-4 shadow-lg">
            <h2 class="fw-bold text-center mb-4">
                <i class="fa-solid fa-users me-2 text-primary"></i> Movie Cast
            </h2>
            <?php if (!empty($cast_list)) { ?>
                <div class="row g-4 justify-content-center">
                    <?php foreach ($cast_list as $cast) { ?>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="card cast-card border-0 shadow-lg text-center h-100 rounded-4">
                                <div class="card-body d-flex flex-column align-items-center p-3">
                                    <img
                                        src="assets/img/action.png"
                                        alt="<?= htmlspecialchars($cast['actor_name']); ?>"
                                        class="cast-img rounded-circle shadow-lg mb-3 border">
                                    <h6 class="fw-semibold mb-1"><?= htmlspecialchars($cast['actor_name']); ?></h6>
                                    <?php if (!empty($cast['role_name'])) { ?>
                                        <small class="text-muted fst-italic">as <?= htmlspecialchars($cast['role_name']); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="text-center text-muted">
                    No cast information available.
                </div>
            <?php } ?>
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