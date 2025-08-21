<header>
    <!-- Navbar (Visible on desktop) -->
    <nav class="navbar navbar-expand-lg px-3 py-0">
        <a href="home.php" class="navbar-brand">
            <img src="assets/img/CineBook_Logo.png" alt="CineBook Logo" class="img-fluid">
        </a>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item mx-2"><a class="nav-link" href="about.php">About Us</a></li>
        </ul>
        <!-- Sign In & Sign Up Button -->
        <div class="d-none d-lg-flex d-flex flex-row">
            <div class="sidebar-btn d-flex flex-row mx-1">
                <a href="login.php" class="btn border border-light text-center">Sign In</a>
            </div>
            <div class="sidebar-btn d-flex flex-row mx-1">
                <a href="register.php" class="btn border border-light text-center">Sign Up</a>
            </div>
        </div>
        <!-- Sidebar Toggle Button -->
        <button class="btn d-lg-none py-2 border border-light ms-2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
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
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-home me-3"></i>
                    <a href="home.php" class="nav-link p-0">Home</a>
                </div>
                <div class="sidebar-a d-flex align-items-center mb-3">
                    <i class="fa fa-circle-info me-3"></i>
                    <a href="about.php" class="nav-link p-0">About Us</a>
                </div>
                <!-- Sign In & Sign Up Button -->
                <div class="d-flex flex-row">
                    <div class="sidebar-btn d-flex flex-row mx-1">
                        <a href="login.php" class="btn border border-light text-center">Sign In</a>
                    </div>
                    <div class="sidebar-btn d-flex flex-row mx-1">
                        <a href="register.php" class="btn border border-light text-center">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="offcanvas-footer p-3">
            <p class="text-center mb-2">&copy; 2025 CineBook. All rights reserved.</p>
        </div>
    </div>
</header>