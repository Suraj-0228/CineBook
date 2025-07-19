<header>
    <!-- Navbar (Visible on desktop) -->
    <nav class="navbar navbar-expand-lg px-3">
        <a href="home.php" class="navbar-brand">
            <img src="assets/img/CineBook_Logo.png" alt="CineBook Logo" class="img-fluid">
        </a>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item mx-2"><a class="nav-link" href="movies.php">Movies</a></li>
            <li class="nav-item mx-2"><a class="nav-link" href="contact.php">Contact Us</a></li>
            <li class="nav-item mx-2"><a class="nav-link" href="about.php">About Us</a></li>
        </ul>
        <div class="d-flex login-btn" style="align-items: center;">
            <a href="login.php"><button class="btn">Login</button></a>
        </div>
        <!-- Sidebar Toggle Button for Mobile -->
        <button class="btn toggle-btn d-lg-none" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class="fas fa-bars mt-1"></i>
        </button>
    </nav>

    <!-- Sidebar (Offcanvas) for Mobile -->
    <div class="offcanvas offcanvas-start p-2" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasExampleLabel">Options Menu</h2>
            <li type="button" class="fa fa-xmark mt-2 text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></li>
        </div>
        <!-- Sidebar Body -->
        <div class="offcanvas-body" style="font-size: 1.2rem;">
            <div class="d-flex flex-column">
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-home mx-2"></i>
                    <a href="home.php" class="nav-link p-0">Home</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-film mx-2"></i>
                    <a href="movies.php" class="nav-link p-0">Movies</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-envelope mx-2"></i>
                    <a href="contact.php" class="nav-link p-0">Contact Us</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-info-circle mx-2"></i>
                    <a href="about.php" class="nav-link p-0">About Us</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-user mx-2"></i>
                    <a href="profile.php" class="nav-link p-0">Profile</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-cog mx-2"></i>
                    <a href="settings.php" class="nav-link p-0">Settings</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-ticket-alt mx-2"></i>
                    <a href="bookings.php" class="nav-link p-0">My Bookings</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-sign-out-alt mx-2"></i>
                    <a href="logout.php" class="nav-link text-danger p-0">Log Out</a>
                </div>
                <div class="sidebar-btn d-flex mt-3 align-items-center">
                    <a href="login.php" class="btn text-center fw-bold">Login</a>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer p-3">
            <p class="text-center mb-2">&copy; 2025 CineBook. All rights reserved.</p>
        </div>
    </div>
</header>