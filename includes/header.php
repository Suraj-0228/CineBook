<!-- MovieMate Header -->
<header>
    <nav class="navbar navbar-expand-lg px-3 py-2 shadow-sm">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand d-flex align-items-center gap-2">
                <i class="fa-solid fa-ticket fa-2xl text-white"></i>
                <h1 class="fw-bold mb-0 text-white">MovieMate</h1>
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
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 py-2 px-3 rounded-pill bg-white bg-opacity-10" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user-circle fa-lg text-white"></i>
                                <span class="d-none d-md-inline small fw-semibold text-white">
                                    <?= htmlspecialchars($_SESSION['username']) ?>
                                </span>
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
                            <a href="login.php"
                                class="me-1 px-4 py-2 bg-white text-primary text-center text-decoration-none fw-semibold rounded text-center">
                                <i class="fa fa-right-to-bracket me-2"></i> Sign In
                            </a>
                            <a href="register.php"
                                class="ms-1 px-4 py-2 bg-white text-success text-center text-decoration-none fw-semibold rounded text-center">
                                <i class="fa fa-user-plus me-2"></i> Sign Up
                            </a>
                        </div>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-start offcanvas-bg" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="width: 280px;">
        <div class="offcanvas-header border-bottom border-secondary py-3">
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-bars-staggered text-white fs-5"></i>
                <h4 class="offcanvas-title fw-bold text-white mb-0">Menu</h4>
            </div>
            <button type="button" class="btn-close btn-close-white shadow-none"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between">
            <div>
                <a href="index.php" class="nav-link text-light mb-2 d-flex align-items-center">
                    <i class="fa fa-home me-3 text-white"></i> Home
                </a>
                <hr class="border-white opacity-75 my-2">
                <a href="movies.php" class="nav-link text-light mb-2 d-flex align-items-center">
                    <i class="fa fa-film me-3 text-white"></i> Movies
                </a>
                <hr class="border-white opacity-75 my-2">
                <a href="my-booking.php" class="nav-link text-light mb-2 d-flex align-items-center">
                    <i class="fa fa-ticket me-3 text-white"></i> My Bookings
                </a>
                <hr class="border-white opacity-75 my-2">
                <a href="about.php" class="nav-link text-light mb-2 d-flex align-items-center">
                    <i class="fa fa-circle-info me-3 text-white"></i> About Us
                </a>
                <hr class="border-white opacity-75 my-2">

                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="profile.php?user_id=<?= (int) $_SESSION['user_id']; ?>"
                        class="nav-link text-light mb-2 d-flex align-items-center">
                        <i class="fa fa-user me-3 text-white"></i> Profile
                    </a>
                    <hr class="border-white opacity-75 my-2">
                    <div class="text-center mt-4">
                        <a href="logout.php"
                            class="px-3 py-2 bg-danger text-white text-center text-decoration-none fw-semibold rounded d-flex align-items-center justify-content-center"
                            onclick="return confirm('Are you sure you want to log out?');">
                            <i class="fa fa-sign-out-alt me-2"></i> Log Out
                        </a>
                    </div>
                <?php else: ?>
                    <div class="mt-3 d-flex flex-column gap-2">
                        <a href="login.php"
                            class="px-3 py-2 bg-white text-dark text-center text-decoration-none fw-semibold rounded text-center">
                            <i class="fa fa-right-to-bracket me-2"></i> Sign In
                        </a>
                        <a href="register.php"
                            class="px-3 py-2 bg-white text-dark text-center text-decoration-none fw-semibold rounded text-center">
                            <i class="fa fa-user-plus me-2"></i> Sign Up
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="text-center border-top border-secondary pt-3 mt-4 small">
                <p class="mb-0 text-white">&copy; 2025 MovieMate. All rights reserved.</p>
            </div>
        </div>
    </div>
</header>