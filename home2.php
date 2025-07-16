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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <div class="slider">
                <div class="card rounded border-0" >
                    <img src="img/movie1.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Avengers: Infinity War</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 9.0/10.0</span>
                        <span class="text-muted">English, Hindi</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
                <div class="card rounded border-0" >
                    <img src="img/movie1.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Avengers: Infinity War</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 9.0/10.0</span>
                        <span class="text-muted">English, Hindi</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
                <div class="card rounded border-0" >
                    <img src="img/movie1.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Avengers: Infinity War</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 9.0/10.0</span>
                        <span class="text-muted">English, Hindi</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
                <div class="card rounded border-0" >
                    <img src="img/movie1.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Avengers: Infinity War</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 9.0/10.0</span>
                        <span class="text-muted">English, Hindi</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
                <div class="card rounded border-0" >
                    <img src="img/movie1.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Avengers: Infinity War</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 9.0/10.0</span>
                        <span class="text-muted">English, Hindi</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
            </div>
            <!-- <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card p-3 rounded border-0" >
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
                <div class="card p-3 rounded border-0" >
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
                <div class="card p-3 rounded border-0" >
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
                <div class="card p-3 rounded border-0" >
                    <img src="img/movie4.jpg" class="card-img-top" alt="Movie...1">
                    <h5 class="card-title fw-bold mt-2">Yevadu</h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span><i class="fa-solid fa-star text-danger"></i> 7.4/10.0</span>
                        <span class="text-muted">English, Hindi</span>
                    </div>
                    <a href="movies.html" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">View Details</a>
                </div>
            </div> -->
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>


    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <script>
            $('.slider').slick({
                arrows: true,
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
   dots: true,
  speed: 300,
   responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow:2 
      }
    },
    {
      breakpoint: 575,
      settings: {
       slidesToShow: 1
      }
    }
  ]
});
		
        </script>
</body>

</html>