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

            $id = $movie['movie_id'];
            $title = $movie['title'];
            $language = $movie['language'];
            $release_date = $movie['release_date'];
            $genre = $movie['genre'];
            $rating = $movie['rating'];
            $poster = $movie['poster_url'];
            $description = $movie['description'];

            // Fetch cast data
            $cast_query = "SELECT actor_name, role_name FROM cast_details WHERE movie_id = '$id'";
            $cast_result = mysqli_query($con, $cast_query);

            $cast_list = [];
            while ($row = mysqli_fetch_assoc($cast_result)) {
                $cast_list[] = $row;
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Movie not Found!!</div>";
            exit;
        }
    } else {
        echo "<script>alert('Invalid Movie ID!'); window.location.href='movies.php';</script>";
        exit;
    }
    ?>

    <section class="container py-4 px-0">
        <button type="button"
            class="back-btn fw-semibold px-4 py-2 rounded"
            onclick="window.history.back()">
            <i class="fa-solid fa-arrow-left me-2"></i> Back
        </button>
    </section>


    <!-- Movie Overview Section -->
    <section class="movies-section pt-3">
        <div class="container p-4 shadow-sm rounded bg-white">
            <div class="row align-items-center g-4">
                <div class="col-12 col-md-4 text-center">
                    <img
                        src="<?= htmlspecialchars($poster); ?>"
                        alt="<?= htmlspecialchars($title); ?>"
                        class="img-fluid rounded-4 shadow-sm border border-light-subtle"
                        style="max-height: 420px; object-fit: cover;">
                </div>
                <div class="col-12 col-md-8">
                    <h1 class="fw-bold mb-3 text-primary"><?= htmlspecialchars($title); ?></h1>
                    <div class="d-flex flex-wrap align-items-center mb-3">
                        <div class="me-3 text-danger">
                            <i class="fa-solid fa-star"></i>
                            <span class="fw-semibold text-dark"><?= htmlspecialchars($rating); ?>/10</span>
                        </div>
                        <a href="#" class="btn btn-sm fw-semibold">
                            <i class="fa-solid fa-pen me-2"></i>Rate Now
                        </a>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li><strong>Language:</strong> <?= htmlspecialchars($language); ?></li>
                        <li><strong>Genre:</strong> <?= htmlspecialchars($genre); ?></li>
                        <li><strong>Duration:</strong> 2h 15m</li>
                        <li><strong>Release Date:</strong> <?= htmlspecialchars($release_date); ?></li>
                    </ul>
                    <a href="booking.php?movie_id=<?= $id; ?>" class="btn fw-semibold px-4 py-2">
                        <i class="fa-solid fa-ticket me-2"></i>Book Ticket
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Description Section -->
    <section class="about-section my-5">
        <div class="container">
            <div class="p-4 bg-light rounded shadow-sm border">
                <h3 class="fw-bold mb-3 text-primary">
                    <i class="fa-solid fa-align-left me-3"></i>Description
                </h3>
                <p class="text-muted lh-base mb-0">
                    <?= nl2br(htmlspecialchars($description)); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Cast Section -->
    <section class="cast-section py-5 bg-white">
        <div class="container">
            <h2 class="fw-bold text-primary text-center mb-5">
                <i class="fa-solid fa-users me-2"></i>Movie Cast
            </h2>
            <div class="row g-4 justify-content-center">
                <?php if (!empty($cast_list)) { ?>
                    <?php foreach ($cast_list as $cast) { ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card border-0 shadow text-center h-100 rounded-4">
                                <div class="card-body p-4">
                                    <img
                                        src="assets/img/action.png"
                                        alt="<?= htmlspecialchars($cast['actor_name']); ?>"
                                        class="img-fluid rounded-circle shadow-sm mb-3 border"
                                        style="width: 100px; height: 100px; object-fit: cover;">

                                    <h6 class="fw-bold text-dark mb-1"><?= htmlspecialchars($cast['actor_name']); ?></h6>
                                    <?php if (!empty($cast['role_name'])) { ?>
                                        <small class="text-muted fst-italic">as <?= htmlspecialchars($cast['role_name']); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-center text-muted">No cast information available.</p>
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