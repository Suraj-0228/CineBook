<!-- 🎥 CineBook Header -->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg px-3 py-2 shadow-sm">
        <div class="container-fluid">
            <!-- Brand -->
            <a href="home.php" class="navbar-brand d-flex align-items-center">
                <h1 class="fw-bold mb-0 text-light">CineBook</h1>
            </a>
            <!-- Toggle Button (Mobile) -->
            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="Toggle navigation">
                <i class="fas fa-bars fa-lg"></i>
            </button>
            <!-- Desktop Nav -->
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2"><a class="nav-link active text-light" href="home.php">Home</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light" href="movies.php">Movies</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light" href="my-booking.php">My Bookings</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light" href="about.php">About Us</a></li>
                    <li class="nav-item mx-2">
                        <a href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>" class="nav-link text-light">Profile</a>
                    </li>
                </ul>
                <!-- Logout (Visible on Desktop) -->
                <div class="d-none d-lg-block">
                    <a href="logout.php"
                        class="bg-danger rounded fw-semibold text-decoration-none text-white px-3 py-2 border border-light"
                        onclick="return confirm('Are You Sure?? You want to Logout!!');">
                        <i class="fa fa-sign-out-alt me-2"></i>Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Offcanvas Sidebar (Mobile Menu) -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header border-bottom border-secondary">
            <h4 class="offcanvas-title fw-bold text-white" id="mobileMenuLabel">Menu</h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between">
            <!-- Menu Items -->
            <div>
                <a href="home.php" class="nav-link text-light mb-3 d-flex align-items-center">
                    <i class="fa fa-home me-3 text-white"></i> Home
                </a>
                <a href="movies.php" class="nav-link text-light mb-3 d-flex align-items-center">
                    <i class="fa fa-film me-3 text-white"></i> Movies
                </a>
                <a href="my-booking.php" class="nav-link text-light mb-3 d-flex align-items-center">
                    <i class="fa fa-ticket me-3 text-white"></i> My Bookings
                </a>
                <a href="about.php" class="nav-link text-light mb-3 d-flex align-items-center">
                    <i class="fa fa-circle-info me-3 text-white"></i> About Us
                </a>
                <a href="profile.php?user_id=<?php echo $_SESSION['user_id']; ?>"
                    class="nav-link text-light mb-3 d-flex align-items-center">
                    <i class="fa fa-user me-3 text-white"></i> Profile
                </a>
                <!-- Logout -->
                <div class="mt-3">
                    <a href="logout.php"
                        class="btn btn-danger w-100 fw-semibold"
                        onclick="return confirm('Are you sure you want to log out?');">
                        <i class="fa fa-sign-out-alt me-2"></i> Log Out
                    </a>
                </div>
            </div>
            <!-- Footer -->
            <div class="text-center border-top border-secondary pt-3 mt-3 small">
                <p class="mb-0 text-secondary">&copy; 2025 <span class="text-white">CineBook</span>. All rights reserved.</p>
            </div>
        </div>
    </div>
</header>