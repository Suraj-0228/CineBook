<!-- Sidebar -->
<nav class="navbar admin-header d-flex flex-column justify-content-between p-3 shadow position-fixed top-0 start-0 vh-100"
     style="width: 260px; z-index: 1000;">

    <!-- Top Section -->
    <div class="w-100">
        <a href="index.php" class="navbar-brand d-flex align-items-center justify-content-center mb-3">
            <h3 class="fw-bold text-white mb-0">
                <i class="fa-solid fa-user-tie me-2"></i> Admin Panel
            </h3>
        </a>
        <hr class="text-white opacity-100">
        <ul class="navbar-nav flex-column">
            <li class="nav-item mb-2">
                <a href="index.php" class="nav-link text-white py-2 px-3 rounded fw-semibold hover-effect">
                    <i class="fa fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_movies.php" class="nav-link text-white py-2 px-3 rounded fw-semibold hover-effect">
                    <i class="fa fa-film me-2"></i> Manage Movies
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_bookings.php" class="nav-link text-white py-2 px-3 rounded fw-semibold hover-effect">
                    <i class="fa fa-ticket me-2"></i> Manage Bookings
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_users.php" class="nav-link text-white py-2 px-3 rounded fw-semibold hover-effect">
                    <i class="fa fa-user me-2"></i> Manage Users
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_theaters.php" class="nav-link text-white py-2 px-3 rounded fw-semibold hover-effect">
                    <i class="fa fa-display me-2"></i> Manage Theaters
                </a>
            </li>
            <li class="nav-item my-3">
                <a href="admin_logout.php" class="nav-link bg-danger text-white py-2 px-3 rounded fw-semibold logout-btn" onclick="return confirm('Are You Sure!! You Want to Logout?');">
                    <i class="fa fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout -->
    <div class="w-100 mt-auto text-center">
        <p class="text-white opacity-75 my-3">&copy; 2025 CineBook</p>
    </div>
</nav>
