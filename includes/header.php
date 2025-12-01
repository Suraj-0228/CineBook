<!-- CineBook Header -->
<header>
    <nav class="navbar navbar-expand-lg px-3 py-2 shadow-sm">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand d-flex align-items-center">
                <h1 class="fw-bold mb-0 text-light">CineBook</h1>
            </a>
            <button class="navbar-toggler btn d-lg-none py-2 border border-light ms-2 text-white" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="Toggle navigation">
                <i class="fas fa-bars fa-lg"></i>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2"><a class="nav-link active text-light" href="index.php">Home</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light" href="movies.php">Movies</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light" href="about.php">About Us</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light" href="contact.php">Contact Us</a></li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light d-flex align-items-center dropdown-toggle"
                                href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                                <i class="fa fa-user-circle fa-2xl text-white"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li>
                                    <a class="dropdown-item" href="profile.php?user_id=<?= $_SESSION['user_id'] ?>">
                                        <i class="fa-solid fa-user me-2"></i> My Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="my-booking.php">
                                        <i class="fa-solid fa-ticket me-2"></i> My Bookings
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger fw-semibold" href="logout.php">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <div class="d-flex flex-row">
                            <div class="d-flex flex-row mx-1">
                                <a href="login.php" class="px-3 py-2 bg-white text-dark text-center text-decoration-none fw-semibold rounded text-center">Sign In</a>
                            </div>
                            <div class="d-flex flex-row mx-1">
                                <a href="register.php" class="px-3 py-2 bg-white text-dark text-center text-decoration-none fw-semibold rounded text-center">Sign Up</a>
                            </div>
                        </div>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
        <div class="offcanvas-header border-bottom border-secondary">
            <h4 class="offcanvas-title fw-bold text-white" id="mobileMenuLabel">Menu</h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between">
            <div>
                <a href="index.php" class="nav-link text-light mb-3 d-flex align-items-center">
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
                <div class="mt-4">
                    <a href="logout.php"
                        class="bg-danger rounded fw-semibold text-decoration-none text-white px-3 py-2 border border-light"
                        onclick="return confirm('Are you sure you want to log out?');">
                        <i class="fa fa-sign-out-alt me-2"></i> Log Out
                    </a>
                </div>
            </div>
            <div class="text-center border-top border-secondary pt-3 mt-3 small">
                <p class="mb-0 text-secondary">&copy; 2025 <span class="text-white">CineBook</span>. All rights reserved.</p>
            </div>
        </div>
    </div>
</header>