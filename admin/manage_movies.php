<?php
session_start();

// If session not set but cookie exists, restore session
if (!isset($_SESSION['adminname']) && isset($_COOKIE['adminname'])) {
    $_SESSION['adminname'] = $_COOKIE['adminname'];
}

// If neither session nor cookie, redirect to login
if (!isset($_SESSION['adminname'])) {
    echo "<script>
        alert('Please, Login to Access CineBook Admin');
        window.location.href = 'admin_login.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Manage Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header1.php'; ?>

    <!-- Add Movies Button -->
    <section class="container my-4">
        <div class="card border-0 shadow p-5 d-flex flex-column align-items-center justify-content-center">
            <h1 class="fw-bold">Manage Movies:</h1>
            <!-- Add New Movie Button -->
            <a href="add_movie.php" class="btn px-2 py-2">
                <i class="fa fa-plus-circle fa-lg mx-1"></i> Add New Movie
            </a href="add_movie.php">
        </div>
    </section>
    <hr class="my-4 mx-4">

    <!-- Display Movies Table -->
    <section class="container my-5">
        <h1 class="fw-bold mb-3">Available Movies:</h1>
        <?php
        require 'includes/dbconnection.php';

        $sql_query = "select * from movies_details";
        $result = mysqli_query($con, $sql_query);

        while ($rows = mysqli_fetch_assoc($result)) {
            $id = $rows['movie_id'];
            $movie_title = $rows['title'];
            $language = $rows['language'];
            $release_date = $rows['release_date'];
            $genre = $rows['genre'];
            $rating = $rows['rating'];
            $poster = $rows['poster_url'];
            $description = $rows['description'];

            echo "<div class='card shadow my-3'>";
            echo "  <div class='row g-0 align-items-center my-3 border-0'>";
            echo "      <div class='col-12 col-md-4 text-center'>";
            echo "          <img src='" . $poster . "' class='rounded m-3' width='200' alt='" . $movie_title . "'>";
            echo "      </div>";
            echo "      <div class='col-12 col-md-8'>";
            echo "          <div class='card-body'>";
            echo "              <p class='mb-1'><strong>Movie ID:</strong> $id</p>";
            echo "              <p class='mb-1'><strong>Movie Title:</strong> $movie_title</p>";
            echo "              <p class='mb-1'><strong>Language:</strong> $language</p>";
            echo "              <p class='mb-1'><strong>Release Date:</strong> $release_date</p>";
            echo "              <p class='mb-1'><strong>Genre:</strong> $genre</p>";
            echo "              <p class='mb-1'><strong>Rating:</strong> $rating <i class='fa-solid fa-star fa-xs text-danger'></i></p>";
            echo "              <p class='mb-1'><strong>Description:</strong> $description</p>";
            echo "              <div class='btn-group mt-3'>";
            echo "                  <a href='update_movie.php?movie_id=" . $id . "' class='bg-success text-white rounded p-2 px-4 mx-1'>";
            echo "                      <i class='fa-solid fa-pencil'></i>";
            echo "                  </a>";
            echo "                  <a href='#' class='bg-danger text-white rounded p-2 px-4 mx-1'>";
            echo "                      <i class='fa-solid fa-trash'></i>";
            echo "                  </a>";
            echo "              </div>";
            echo "          </div>";
            echo "      </div>";
            echo "  </div>";
            echo "</div>";
        }
        ?>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>