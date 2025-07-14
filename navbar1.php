<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Mobile view: Hide the navbar and display the offcanvas */
        @media (max-width: 767px) {

            .navbar .container-fluid,
            .login-btn {
                display: none !important;
            }

            .offcanvas {
                display: block !important;
                width: 18rem;
            }

            .offcanvas-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
        }

        /* Desktop view: Display navbar and hide offcanvas */
        @media (min-width: 768px) {
            .navbar {
                display: flex !important;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar (Visible on desktop) -->
    <nav class="navbar navbar-expand-lg px-3" style="background-color: #0c1424;">
        <div class="logo mt-2" style="color: #f8f6fa;">
            <h1>CineBook</h1>
        </div>
        <div class="container-fluid">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2"><a class="nav-link" style="color: #f8f6fa; font-size: 1.4rem;" href="home.php">Home</a></li>
                <li class="nav-item mx-2"><a class="nav-link" style="color: #f8f6fa; font-size: 1.4rem;" href="movies.php">Movies</a></li>
                <li class="nav-item mx-2"><a class="nav-link" style="color: #f8f6fa; font-size: 1.4rem;" href="contact.php">Contact Us</a></li>
                <li class="nav-item mx-2"><a class="nav-link" style="color: #f8f6fa; font-size: 1.4rem;" href="about.php">About Us</a></li>
            </ul>
        </div>
        <div class="d-flex login-btn" style="align-items: center;">
            <a href="login.php"><button class="btn fw-bold" style="background-color: #f8f6fa; color: #0c1424; font-size: 1.2rem;">Login</button></a>
        </div>
        <!-- Sidebar Toggle Button for Mobile -->
        <button class="btn mx- d-lg-none" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="border: 1px solid #f8f6fa;">
            <i class="fas fa-bars mt-1" style="color: #f8f6fa; font-size: 1.6rem;"></i>
        </button>
    </nav>


    <!-- Sidebar (Offcanvas) for Mobile -->
    <div class="offcanvas offcanvas-start p-2" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="background-color: #0c1424; color: #f8f6fa;">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasExampleLabel" style="border-bottom: 2px solid #f8f6fa;">More Options</h2>
            <li type="button" class="fa fa-xmark fa-lg mt-2 text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="color: #f8f6fa;"></li>
        </div>
        <!-- Sidebar Body -->
        <div class="offcanvas-body" style="font-size: 1.2rem;">
            <div class="d-flex flex-column">
                <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid #f8f6fa; padding-bottom: 10px;">
                    <li class="fa fa-home d-flex align-items-center mx-2"></li>
                    <a href="home.php" class="nav-link text-white p-0">Home</a>
                </div>
                <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid #f8f6fa; padding-bottom: 10px;">
                    <li class="fa fa-film d-flex align-items-center mx-2"></li>
                    <a href="movies.php" class="nav-link text-white p-0">Movies</a>
                </div>
                <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid #f8f6fa; padding-bottom: 10px;">
                    <li class="fa fa-envelope d-flex align-items-center mx-2"></li>
                    <a href="contact.php" class="nav-link text-white p-0">Contact Us</a>
                </div>
                <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid #f8f6fa; padding-bottom: 10px;">
                    <li class="fa fa-info-circle d-flex align-items-center mx-2"></li>
                    <a href="about.php" class="nav-link text-white p-0">About Us</a>
                </div>
                <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid #f8f6fa; padding-bottom: 10px;">
                    <li class="fa fa-user d-flex align-items-center mx-2"></li>
                    <a href="profile.php" class="nav-link text-white p-0">Profile</a>
                </div>
                <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid #f8f6fa; padding-bottom: 10px;">
                    <li class="fa fa-cog d-flex align-items-center mx-2"></li>
                    <a href="settings.php" class="nav-link text-white p-0">Settings</a>
                </div>
                <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid #f8f6fa; padding-bottom: 10px;">
                    <li class="fa fa-ticket-alt d-flex align-items-center mx-2"></li>
                    <a href="bookings.php" class="nav-link text-white p-0">My Bookings</a>
                </div>
                <div class="d-flex align-items-center mb-3" style="border-bottom: 1px solid #f8f6fa; padding-bottom: 10px;">
                    <li class="fa fa-sign-out-alt d-flex align-items-center mx-2"></li>
                    <a href="logout.php" class="nav-link text-white p-0">Log Out</a>
                </div>
                <div class="d-flex mt-3" style="align-items: center;">
                    <a href="login.php"><button class="btn fw-bold" style="width: 14rem; background-color: #f8f6fa; color: #0c1424; font-size: 1.2rem;">Login</button></a>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer p-3" style="position: absolute; bottom: 0; left: 0; width: 100%;">
            <p class="text-center mb-2" style="font-size: 1rem;">&copy; 2025 CineBook. All rights reserved.</p>
        </div>
    </div>

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>