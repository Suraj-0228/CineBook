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
    <title>CineBook - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header1.php'; ?>

    <!-- Update Movies Form -->
    <div class="container py-5 pb-0">
        <div class="card border-0 shadow p-4">
            <h1 class="text-center fw-bold">Update Movies:</h1>
            <hr class="mb-4">
            <?php
                require 'includes/dbconnection.php';

                $id = $_GET['movie_id'];

                $sql_query = "select * from movies_details where movie_id = '$id'";
                $result = mysqli_query($con, $sql_query);

                $rows = mysqli_fetch_assoc($result);
                    $id = $rows['movie_id'];
                    $movie_title = $rows['title'];
                    $language = $rows['language'];
                    $release_date = $rows['release_date'];
                    $genre = $rows['genre'];
                    $rating = $rows['rating'];
                    $poster = $rows['poster_url'];
                    $description = $rows['description'];                
            ?>
            <form>
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Movie Title:</label>
                    <input type="hidden" class="form-control" name="title" id="title" placeholder="Enter Movie Title...." value="<?php echo $movie_title; ?>">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter Movie Title...." value="<?php echo $movie_title; ?>">
                </div>
                <div class="mb-3">
                    <label for="language" class="form-label fw-bold">Language</label>
                    <input type="hidden" class="form-control" name="language" id="language" placeholder="Enter Movie Language...." value="<?php echo $language; ?>">
                    <input type="text" class="form-control" name="language" id="language" placeholder="Enter Movie Language...." value="<?php echo $language; ?>">
                </div>
                <div class="mb-3">
                    <label for="release_date" class="form-label fw-bold">Release Date</label>
                    <input type="hidden" class="form-control" name="release_date" id="release_date" value="<?php echo $release_date; ?>">
                    <input type="date" class="form-control" name="release_date" id="release_date" value="<?php echo $release_date; ?>">
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label fw-bold">Genre:</label>
                    <input type="hidden" class="form-control" name="genre" id="genre" placeholder="Enter Movie Genre...." value="<?php echo $genre; ?>">
                    <input type="text" class="form-control" name="genre" id="genre" placeholder="Enter Movie Genre...." value="<?php echo $genre; ?>">
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label fw-bold">Movie Rating:</label>
                    <input type="hidden" class="form-control" name="rating" id="rating" value="<?php echo $rating; ?>">
                    <input type="text" class="form-control" name="rating" id="rating" value="<?php echo $rating; ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter Movie Description...."></textarea>
                </div>
                <div class="mb-3">
                    <label for="poster_url" class="form-label fw-bold">Poster URL:</label>
                    <input type="text" name="poster_url" id="poster_url" class="form-control" placeholder="Enter Poster URL....">
                </div>
                <button type="submit" class="btn btn-warning">Update Movie</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>