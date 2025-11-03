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
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <main class="d-flex">

        <!-- Navbar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Manage Movies Section -->
        <section class="w-100 p-3">
            <!-- Add Movies Button -->
            <section class="container my-4">
                <div class="d-flex justify-content-between align-items-center p-4 shadow rounded bg-white">
                    <h2 class="fw-bold m-0">Manage Movies</h2>
                    <!-- Add New Movie Button -->
                    <a href="add_movie.php" class="btn btn-primary d-flex align-items-center">
                        <i class="fa fa-plus-circle fa-lg me-2"></i> Add New Movie
                    </a>
                </div>
                <hr class="my-4">
            </section>

            <!-- Display Movies Table -->
            <section class="container my-3">
                <table class="table table-bordered table-striped table-hover align-middle shadow">
                    <thead class="text-center">
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
                    <tbody>
                        <?php
                        require 'includes/dbconnection.php';
                        $sql_query = "SELECT * FROM movies_details";
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
                        ?>
                            <tr class="text-center">
                                <td>
                                    <img src="<?= $poster ?>" class="rounded" width="100" alt="<?= $movie_title ?>">
                                </td>
                                <td><?= $id ?></td>
                                <td><?= $movie_title ?></td>
                                <td><?= $language ?></td>
                                <td><?= $release_date ?></td>
                                <td><?= $genre ?></td>
                                <td><?= $rating ?> <i class="fa-solid fa-star fa-xs text-danger"></i></td>
                                <td class="text-truncate" style="max-width: 250px;"><?= $description ?></td>
                                <td class="text-center">
                                    <a href="update_movie.php?movie_id=<?= $id ?>" class="text-success text-decoration-none btn-sm mx-1">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <a href="controllers/delete-movie.php?movie_id=<?= $id ?>" class="text-danger text-decoration-none btn-sm mx-1">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </section>
    </main>

</body>

</html>