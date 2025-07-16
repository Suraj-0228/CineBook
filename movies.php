<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Movies Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar1.php'; ?>

    <!-- Search & Filter Section -->
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search for Movies..." style="max-width: 100%; border:1px solid #0c1424;" aria-label="Search">
                    <button class="btn" style="background-color: #0c1424; color: #f8f6fa;" type="submit">Search</button>
                </form>
            </div>
            <div class="col-12 col-md-10 d-flex justify-content-start flex-wrap gap-2 mt-2">
                <div class="dropdown">
                    <button class="btn btn-outline-dark fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Language
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Hindi</a></li>
                        <li><a class="dropdown-item" href="#">Telugu</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-dark fw-bold dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Genre
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Drama & Comedy</a></li>
                        <li><a class="dropdown-item" href="#">Horror</a></li>
                        <li><a class="dropdown-item" href="#">Romance</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Movie Cards Section -->
    <section class="container mb-5">
        <hr class="" style="border: 1px solid #0c1424;">
        <h1 class="text-center mb-4" style="font-size: 2.3rem;">Explore All Movies...</h1>
        <div class="container px-3">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card p-3 rounded border-0" style="box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.6);">
                        <img src="img/movie5.jpg" class="card-img-top" alt="Movie...1">
                        <h5 class="card-title fw-bold mt-2">Iron Man 2</h5>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span><i class="fa-solid fa-star text-danger"></i> 8.5/10.0</span>
                            <span class="text-muted">English, Hindi</span>
                        </div>
                        <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card p-3 rounded border-0" style="box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.6);">
                        <img src="img/movie6.jpg" class="card-img-top" alt="Movie...1">
                        <h5 class="card-title fw-bold mt-2">Horror In the Forest</h5>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span><i class="fa-solid fa-star text-danger"></i> 7.5/10.0</span>
                            <span class="text-muted">English</span>
                        </div>
                        <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card p-3 rounded border-0" style="box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.6);">
                        <img src="img/movie7.jpg" class="card-img-top" alt="Movie...1">
                        <h5 class="card-title fw-bold mt-2">Clown</h5>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span><i class="fa-solid fa-star text-danger"></i> 7.9/10.0</span>
                            <span class="text-muted">English</span>
                        </div>
                        <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card p-3 rounded border-0" style="box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.6);">
                        <img src="img/movie8.jpg" class="card-img-top" alt="Movie...1">
                        <h5 class="card-title fw-bold mt-2">Avatar: The Way of Water</h5>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span><i class="fa-solid fa-star text-danger"></i> 8.3/10.0</span>
                            <span class="text-muted">English, Hindi</span>
                        </div>
                        <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>