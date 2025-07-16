<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css" />
</head>

<body>

    <!-- navbar -->
    <?php include 'navbar1.php'; ?>

    <!-- Hero Section -->
    <section class="container mt-5 mb-5">
        <div class="row align-items-center">
            <div class="col-md-6 d-none d-md-block">
                <img src="https://www.selfpublishingreview.com/wp-content/uploads/2020/12/pitchyrmovie.jpg"
                    alt="Hero Image" class="img-fluid" style="box-shadow: 0 1rem 2rem rgb(0, 0, 0, 0.60);">
            </div>
            <div class="col-12 col-md-6 mt-md-0">
                <h1 class="fw-bold" style="color: #0c1424;">Welcome to CineBook</h1>
                <p class="fw-normal" style="color: #0c1424;">Your One-Stop Destination for All Movie-Related Information.</p>
                <a href="login.php" class="btn" style="background-color: #0c1424; color: #f8f6fa;">Explore Movies</a>
            </div>
        </div>
    </section>

    <!-- Movie Cards 1 -->
    <section class="container my-4 px-4">
        <hr class="" style="border: 1px solid #0c1424;">
        <h1 class="text-center mb-4" style="font-size: 2.5rem;">Now Showing</h1>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card p-3 rounded border-0" style="box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.6);">
                    <img src="img/movie1.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Avengers: Infinity War</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 9.0/10.0</span>
                        <span class="text-muted">English, Hindi</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card p-3 rounded border-0" style="box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.6);">
                    <img src="img/movie2.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">KGF Chapter - 2</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 8.3/10.0</span>
                        <span class="text-muted">English, Hindi, Telugu</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card p-3 rounded border-0" style="box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.6);">
                    <img src="img/movie3.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Pushpa 2: The Rule</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 9.3/10.0</span>
                        <span class="text-muted">English, Hindi, Telugu</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card p-3 rounded border-0" style="box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.6);">
                    <img src="img/movie4.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Yevadu</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 7.4/10.0</span>
                        <span class="text-muted">English, Hindi</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
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