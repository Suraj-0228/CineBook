<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieMate - Movies Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/movies.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.svg" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Search & Filter Section -->
    <section class="movies-filter-section py-4">
        <div class="container">
            <?php
            require 'includes/dbconnection.php';

            $filter_genre = isset($_GET['genre']) ? $_GET['genre'] : '';
            $search_query = isset($_GET['search']) ? trim($_GET['search']) : '';

            $limit = 8; // Movies per page
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $start = ($page - 1) * $limit;
            $sql_query = "SELECT * FROM movies_details WHERE 1=1";

            if (!empty($filter_genre)) {
                $sql_query .= " AND genre = '" . mysqli_real_escape_string($con, $filter_genre) . "'";
            }

            if (!empty($search_query)) {
                $sql_query .= " AND title LIKE '%" . mysqli_real_escape_string($con, $search_query) . "%'";
            }

            // Count total results for pagination
            $count_query = str_replace("SELECT *", "SELECT COUNT(*) AS total", $sql_query);
            $count_result = mysqli_query($con, $count_query);
            $total_row = mysqli_fetch_assoc($count_result);
            $total_movies = $total_row['total'];
            $total_pages = ceil($total_movies / $limit);

            // Add limit for current page
            $sql_query .= " LIMIT $start, $limit";
            $result = mysqli_query($con, $sql_query);
            ?>

            <div class="filter-card shadow-lg rounded-4 px-4 px-md-4 py-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                    <div>
                        <h3 class="mb-0 fw-semibold">Find Your Movie</h3>
                        <small class="text-muted">
                            Search by title or narrow down by genre.
                        </small>
                    </div>
                    <?php if (!empty($search_query) || !empty($filter_genre)): ?>
                        <div class="active-filter-badge">
                            <i class="fa-solid fa-filter me-1"></i>
                            Showing results
                            <?php if (!empty($search_query)): ?>
                                for "<span class="fw-semibold text-primary"><?= htmlspecialchars($search_query) ?></span>"
                            <?php endif; ?>
                            <?php if (!empty($filter_genre)): ?>
                                in <span class="fw-semibold text-primary"><?= htmlspecialchars($filter_genre) ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <form method="GET" action="movies.php">
                    <div class="row g-3 align-items-center mt-3">
                        <div class="col-12 col-md-6 mt-0">
                            <div class="input-group search-group">
                                <span class="input-group-text border-0">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                                <input type="text" name="search" class="form-control search-text"
                                    placeholder="Search by movie name..." value="<?= htmlspecialchars($search_query) ?>">
                            </div>
                        </div>
                        <div class="col-12 col-md-3 mt-2 mt-lg-0">
                            <select name="genre" id="genre" class="form-select filter-select" onchange="this.form.submit()">
                                <option value="">All Genres</option>
                                <option value="Action" <?= ($filter_genre == 'Action') ? 'selected' : '' ?>>Action</option>
                                <option value="Comedy" <?= ($filter_genre == 'Comedy') ? 'selected' : '' ?>>Comedy</option>
                                <option value="Horror" <?= ($filter_genre == 'Horror') ? 'selected' : '' ?>>Horror</option>
                                <option value="Thriller" <?= ($filter_genre == 'Thriller') ? 'selected' : '' ?>>Thriller</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3 mt-2 mt-lg-0 text-md-end d-flex gap-2 justify-content-end">
                            <button class="btn search-btn fw-semibold  w-50 w-md-auto" type="submit">
                                <i class="fa-solid fa-search me-1"></i> Search
                            </button>
                            <a href="movies.php" class="btn clear-btn fw-semibold w-50 w-md-auto">
                                <i class="fa-solid fa-rotate-right me-1"></i> Clear
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <hr class="custom-hr mt-4">
        </div>
    </section>

    <!-- Movie Cards Section -->
    <section class="container py-4 mb-4">
        <h1 class="text-center fw-bold mb-4">Explore All Movies...</h1>
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
                        <div class="card movie-card h-100 shadow-lg border-0">
                            <a href="movies-details.php?id=<?= (int)$id ?>" class="text-decoration-none">
                                <img src="<?= htmlspecialchars($poster) ?>" class="card-img-top" alt="<?= htmlspecialchars($title) ?>">
                            </a>
                            <div class="card-body">
                                <h6 class="fw-bold text-dark text- mb-2">
                                    <?= htmlspecialchars($title) ?>
                                </h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-warning text-dark">
                                        <i class="fa-solid fa-star me-1"></i>
                                        <?= htmlspecialchars($rating) ?>
                                    </span>
                                    <span class="badge bg-light text-dark">
                                        <?= htmlspecialchars($language) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p class='text-center text-danger fw-semibold'>No Movies Found!!</p>";
            }
            ?>
        </div>

        <!-- Pagination Controls -->
        <?php if ($total_pages > 1): ?>
            <nav aria-label="Movies pagination">
                <ul class="pagination justify-content-center mt-5">
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link fw-semibold shadow-sm"
                            href="?page=<?= max(1, $page - 1) ?>&search=<?= urlencode($search_query) ?>&genre=<?= urlencode($filter_genre) ?>">
                            <i class="fa-solid fa-chevron-left"></i> Prev
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                            <a class="page-link fw-semibold shadow-sm <?= ($page == $i) ? 'text-white' : '' ?>"
                                href="?page=<?= $i ?>&search=<?= urlencode($search_query) ?>&genre=<?= urlencode($filter_genre) ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link fw-semibold shadow-sm"
                            href="?page=<?= min($total_pages, $page + 1) ?>&search=<?= urlencode($search_query) ?>&genre=<?= urlencode($filter_genre) ?>">
                            Next <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    </section>

    <!-- Categories Section -->
    <section class="category-section pb-5">
        <div class="container bg-white py-5 rounded shadow-lg">
            <div class="text-center mb-4">
                <h2 class="explore-title fw-bold mb-1">Explore by Category</h2>
                <p class="text-muted mb-0">
                    Quickly find movies you love by choosing your favourite genre.
                </p>
            </div>
            <div class="row justify-content-center g-4">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="category-card text-decoration-none d-block text-center h-100">
                        <div class="category-icon-wrapper mx-auto">
                            <img src="assets/img/action.png" alt="Action" class="category-img">
                        </div>
                        <p class="category-text mt-3 fw-semibold mb-0">Action</p>
                        <span class="category-subtext small text-muted">High-octane thrills</span>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="category-card text-decoration-none d-block text-center h-100">
                        <div class="category-icon-wrapper mx-auto">
                            <img src="assets/img/comedy.png" alt="Comedy" class="category-img">
                        </div>
                        <p class="category-text mt-3 fw-semibold mb-0">Comedy</p>
                        <span class="category-subtext small text-muted">Laugh-out-loud fun</span>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="category-card text-decoration-none d-block text-center h-100">
                        <div class="category-icon-wrapper mx-auto">
                            <img src="assets/img/horror.png" alt="Horror" class="category-img">
                        </div>
                        <p class="category-text mt-3 fw-semibold mb-0">Horror</p>
                        <span class="category-subtext small text-muted">Spine-chilling nights</span>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="category-card text-decoration-none d-block text-center h-100">
                        <div class="category-icon-wrapper mx-auto">
                            <img src="assets/img/thriller.png" alt="Thriller" class="category-img">
                        </div>
                        <p class="category-text mt-3 fw-semibold mb-0">Thriller</p>
                        <span class="category-subtext small text-muted">Edge-of-seat twists</span>
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