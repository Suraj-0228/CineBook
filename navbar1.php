<header>
    <!-- Navbar (Visible on desktop) -->
    <nav class="navbar navbar-expand-lg px-3 py-0">
        <a href="home.php" class="navbar-brand">
            <img src="assets/img/CineBook_Logo.png" alt="CineBook Logo" class="img-fluid">
        </a>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item mx-2"><a class="nav-link" href="movies.php">Movies</a></li>
            <li class="nav-item mx-2"><a class="nav-link" href="my-booking.php">My Bookings</a></li>
            <li class="nav-item mx-2"><a class="nav-link" href="about.php">About Us</a></li>
        </ul>
        <div class="d-flex login-btn" style="align-items: center;">
            <a href="login.php"><button class="btn border border-light">Sign-In</button></a>
        </div>
        <!-- Sidebar Toggle Button -->
        <button class="btn toggle-btn py-2 border border-light ms-2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class="fas fa-bars fa-xl"></i>
        </button>
    </nav>
    <!-- Sidebar (Offcanvas) for Mobile -->
    <div class="offcanvas offcanvas-start p-2" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header justify-content-between">
            <h2 class="offcanvas-title" id="offcanvasExampleLabel">Options Menu</h2>
            <li type="button" class="fa fa-xmark mt-1 text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></li>
        </div>
        <!-- Sidebar Body -->
        <div class="offcanvas-body" style="font-size: 1.2rem;">
            <div class="d-flex flex-column">
                <div class="sidebar-a d-flex align-items-center d-lg-none mb-3">
                    <i class="fa fa-home me-3"></i>
                    <a href="home.php" class="nav-link p-0">Home</a>
                </div>
                <div class="sidebar-a d-flex align-items-center d-lg-none mb-3">
                    <i class="fa fa-film me-3"></i>
                    <a href="movies.php" class="nav-link p-0">Movies</a>
                </div>
                <div class="sidebar-a d-flex align-items-center d-lg-none mb-3">
                    <i class="fa fa-info-circle me-3"></i>
                    <a href="about.php" class="nav-link p-0">About Us</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-user me-3"></i>
                    <a href="profile.php" class="nav-link p-0">Profile</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-ticket-alt me-3"></i>
                    <a href="my-booking.php" class="nav-link p-0">My Bookings</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-cog me-3"></i>
                    <a href="settings.php" class="nav-link p-0">Settings</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-sign-out-alt me-3"></i>
                    <a href="logout.php" class="nav-link text-danger p-0">Log Out</a>
                </div>
                <div class="sidebar-btn d-flex mt-3 align-items-center">
                    <a href="login.php" class="btn border border-light text-center fw-bold">Sign-In</a>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer p-3">
            <p class="text-center mb-2">&copy; 2025 CineBook. All rights reserved.</p>
        </div>
    </div>
</header>