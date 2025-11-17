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
        window.location.href = '../login.php';
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
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <main class="d-flex">

        <!-- Navbar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Manage Movies Section -->
        <section class="content-area flex-grow-1" style="margin-left: 260px; padding: 20px;">
            <section class="container my-5 px-4" style="width: 80rem;">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4">
                    <h1 class="fw-bold text-primary text-uppercase mb-3 mb-md-0">
                        <i class="fa-solid fa-video me-2"></i> Manage Movies
                    </h1>
                    <a href="add_movie.php" class="bg-success text-white rounded border-0 w-md-auto px-5 py-2 fw-semibold shadow-sm text-decoration-none">
                        <i class="fa-solid fa-plus me-2"></i> Add Movie
                    </a>
                </div>
                <div class="table-responsive shadow rounded border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Poster</th>
                                <th>Movie ID</th>
                                <th>Title</th>
                                <th>Language</th>
                                <th>Release Date</th>
                                <th>Genre</th>
                                <th>Rating</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            require 'includes/dbconnection.php';
                            $sql_query = "SELECT * FROM movies_details";
                            $result = mysqli_query($con, $sql_query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $id = $rows['movie_id'];
                                    $movie_title = $rows['title'];
                                    $language = $rows['language'];
                                    $release_date = $rows['release_date'];
                                    $genre = $rows['genre'];
                                    $rating = $rows['rating'];
                                    $poster = $rows['poster_url'];
                                    $description = $rows['description'];
                            ?>
                                    <tr>
                                        <td>
                                            <img src="<?= htmlspecialchars($poster) ?>"
                                                alt="<?= htmlspecialchars($movie_title) ?>"
                                                class="img-fluid rounded shadow-sm border"
                                                style="width: 90px; height: 120px; object-fit: cover;">
                                        </td>
                                        <td class="fw-semibold"><?= $id ?></td>
                                        <td class="fw-semibold"><?= htmlspecialchars($movie_title) ?></td>
                                        <td><?= htmlspecialchars($language) ?></td>
                                        <td><?= htmlspecialchars($release_date) ?></td>
                                        <td>
                                            <span class="badge bg-secondary px-3 py-2"><?= htmlspecialchars($genre) ?></span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold"><?= $rating ?></span>
                                            <i class="fa-solid fa-star text-danger ms-1"></i>
                                        </td>
                                        <td class="text-start text-truncate" style="max-width: 250px;">
                                            <?= htmlspecialchars($description) ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="update_movie.php?movie_id=<?= $id ?>"
                                                    class="text-success text-decoration-none"
                                                    data-bs-toggle="tooltip" title="Edit Movie">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </a>
                                                <a href="controllers/delete-movie.php?movie_id=<?= $id ?>"
                                                    class="text-danger text-decoration-none"
                                                    onclick="return confirm('Are you sure you want to delete this movie?');"
                                                    data-bs-toggle="tooltip" title="Delete Movie">
                                                    <i class="fa-solid fa-trash fa-lg"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='9' class='text-center text-muted py-4'>No movies available.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </main>

</body>

</html>