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

    <!-- 🔍 Search & Filter Section -->
    <div class="container py-3 px-0">
        <div class="row justify-content-center mx-2">
            <div class="container mt-4 mb-3 text-center">
                <form method="GET" action="movies.php" class="d-inline-block">
                    <?php
                    require 'includes/dbconnection.php';

                    // Get filter values
                    $filter_genre = isset($_GET['genre']) ? $_GET['genre'] : '';
                    $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';

                    // Build SQL based on filters
                    $sql_query = "SELECT * FROM movies_details WHERE 1=1";

                    if (!empty($filter_genre)) {
                        $sql_query .= " AND genre = '$filter_genre'";
                    }
                    if (!empty($search_query)) {
                        $sql_query .= " AND title LIKE '%$search_query%'";
                    }

                    // Execute query
                    $result = mysqli_query($con, $sql_query);
                    ?>

                    <!-- Search Box -->
                    <div class="input-group mb-3 d-inline-flex w-75 me-3">
                        <input type="text" name="search" class="form-control"
                            placeholder="Search by Movie Name....."
                            value="<?= htmlspecialchars($search_query) ?>">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>

                    <!-- Genre Dropdown -->
                    <label for="genre" class="fw-semibold me-2">Filter by Genre:</label>
                    <select name="genre" id="genre" class="form-select d-inline-block w-auto"
                        onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="Action" <?= ($filter_genre == 'Action') ? 'selected' : '' ?>>Action</option>
                        <option value="Comedy" <?= ($filter_genre == 'Comedy') ? 'selected' : '' ?>>Comedy</option>
                        <option value="Horror" <?= ($filter_genre == 'Horror') ? 'selected' : '' ?>>Horror</option>
                        <option value="Thriller" <?= ($filter_genre == 'Thriller') ? 'selected' : '' ?>>Thriller</option>
                    </select>
                </form>
            </div>
        </div>
        <hr class="custom-hr">
    </div>

    <!-- 🎥 Movie Cards Section -->
    <section class="container py-4 mb-4">
        <h1 class="text-center fw-bold mb-4">Explore All Movies...</h1>

        <?php
        require 'includes/dbconnection.php';

        $limit = 8; // Movies per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $total_query = "SELECT COUNT(*) as total FROM movies_details";
        $total_result = mysqli_query($con, $total_query);
        $total_row = mysqli_fetch_assoc($total_result);
        $total_movies = $total_row['total'];
        $total_pages = ceil($total_movies / $limit);

        $sql_query = "SELECT * FROM movies_details LIMIT $start, $limit";
        $result = mysqli_query($con, $sql_query);
        ?>

        <div class="row justify-content-center">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['movie_id'];
                    $title = $rows['title'];
                    $poster = $rows['poster_url'];
                    $rating = $rows['rating'];
                    $language = $rows['language'];
            ?>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div class="card h-100 shadow-sm border-0 rounded-3">
                            <a href="movies-details.php?id=<?= $id ?>">
                                <img src="<?= $poster ?>" class="card-img-top rounded-top" alt="<?= htmlspecialchars($title) ?>">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-truncate"><?= htmlspecialchars($title) ?></h5>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span><i class="fa-solid fa-star text-danger"></i> <?= $rating ?>/10</span>
                                    <span class="badge bg-light text-dark"><?= htmlspecialchars($language) ?></span>
                                </div>
                                <a href="movies-details.php?id=<?= $id ?>" class="btn btn-outline-primary w-100 fw-semibold">
                                    <i class="fa-solid fa-film me-2"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p class='text-center text-muted'>No movies found.</p>";
            }
            ?>
        </div>

        <!-- Pagination Controls -->
        <?php if ($total_pages > 1): ?>
            <nav aria-label="Movies pagination">
                <ul class="pagination pagination-lg justify-content-center mt-5">
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link fw-semibold shadow-sm" href="?page=<?= max(1, $page - 1) ?>" tabindex="-1">
                            <i class="fa-solid fa-chevron-left"></i> Prev
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                            <a class="page-link fw-semibold shadow-sm <?= ($page == $i) ? 'bg-primary text-white border-primary' : '' ?>"
                                href="?page=<?= $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link fw-semibold shadow-sm" href="?page=<?= min($total_pages, $page + 1) ?>">
                            Next <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    </section>

    <!-- Categories Section -->
    <section class="category-section p-4">
        <div class="container">
            <h1 class="text-center explore-title fw-bold mb-4">Explore by Category</h1>
            <div class="row justify-content-center g-4">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="category-card text-decoration-none d-block text-center border-0 rounded p-3 h-100">
                        <img src="assets/img/action.png" alt="Action" class="category-img img-fluid rounded-circle">
                        <p class="category-text mt-3 fw-semibold">Action</p>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="category-card text-decoration-none d-block text-center border-0 rounded p-3 h-100">
                        <img src="assets/img/comedy.png" alt="Comedy" class="category-img img-fluid rounded-circle">
                        <p class="category-text mt-3 fw-semibold">Comedy</p>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="category-card text-decoration-none d-block text-center border-0 rounded p-3 h-100">
                        <img src="assets/img/horror.png" alt="Horror" class="category-img img-fluid rounded-circle">
                        <p class="category-text mt-3 fw-semibold">Horror</p>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="category-card text-decoration-none d-block text-center border-0 rounded p-3 h-100">
                        <img src="assets/img/thriller.png" alt="Thriller" class="category-img img-fluid rounded-circle">
                        <p class="category-text mt-3 fw-semibold">Thriller</p>
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