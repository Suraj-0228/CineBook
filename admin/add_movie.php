<!-- Requring Add Movie File -->
<?php require 'controllers/add-process.php' ?>

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
    <title>CineBook - Add Movie Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header1.php'; ?>

    <!-- Update Movies Form -->
    <div class="container py-5 pb-0">
        <div class="card border-0 shadow p-4">
            <h1 class="text-center fw-bold">Add New Movies:</h1>
            <hr class="mb-4">

            <form action="#" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Movie Title:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Movie Title....">
                </div>
                <div class="mb-3">
                    <label for="language" class="form-label fw-bold">Language</label>
                    <input type="text" class="form-control" name="language" id="language" placeholder="Enter Movie Language....">
                </div>
                <div class="mb-3">
                    <label for="release_date" class="form-label fw-bold">Release Date</label>
                    <input type="date" class="form-control" name="release_date" id="release_date" placeholder="Enter Release Date....">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label fw-bold">Genre:</label>
                    <input type="text" class="form-control" name="genre" id="genre" placeholder="Enter Movie Genre....">
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label fw-bold">Movie Rating:</label>
                    <input type="text" class="form-control" name="rating" id="rating" placeholder="Enter Movie Rating....">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Movie Description...."></textarea>
                </div>
                <div class="mb-3">
                    <label for="poster_url" class="form-label fw-bold">Poster URL:</label>
                    <input type="text" name="poster_url" id="poster_url" class="form-control" placeholder="Enter Movie URL....">
                </div>
                <button type="submit" class="btn">Add Movie</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>