<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: #0c1424;">
        <div class="container-fluid">
            <div class="logo me-3" style="color: #f8f6fa;">
                <h1 class="m-0 fw-bold">CineBook</h1>
            </div>
            <button class="navbar-toggler text-white border-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" style="color: #f8f6fa; font-size: 1.4rem;" href="home.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" style="color: #f8f6fa; font-size: 1.4rem;" href="movies.php">Movies</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" style="color: #f8f6fa; font-size: 1.4rem;" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" style="color: #f8f6fa; font-size: 1.4rem;" href="about.php">About Us</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center mt-3 mt-lg-0">
                    <a href="login.php">
                        <button class="btn fw-bold" style="width: 7rem; background-color: #f8f6fa; color: #0c1424; font-size: 1.3rem;">Login</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>