<!-- Sidebar -->
<nav class="navbar navbar-dark bg-dark flex-column justify-content-between vh-100 p-3" style="width: 320px;">
    <div class="w-100">

        <!-- Title -->
        <h2 class="text-center fw-bold text-white border-bottom border-secondary pb-2 mb-3">Admin Panel</h2>

        <!-- Links -->
        <ul class="navbar-nav flex-column">
            <li class="nav-item mb-2">
                <a href="index.php" class="nav-link text-white d-flex align-items-center">
                    <i class="fa fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_movies.php" class="nav-link text-white d-flex align-items-center">
                    <i class="fa fa-film me-2"></i> Manage Movies
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_bookings.php" class="nav-link text-white d-flex align-items-center">
                    <i class="fa fa-ticket me-2"></i> Manage Bookings
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_users.php" class="nav-link text-white d-flex align-items-center">
                    <i class="fa fa-user me-2"></i> Manage Users
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout -->
    <div class="w-100">
        <a href="admin_logout.php" class="bg-danger text-white text-decoration-none d-block text-center py-2 rounded mb-2"
            onclick="return confirm('Are You Sure!! You want to Logout??');">
            <i class="fa fa-sign-out-alt me-2"></i> Logout
        </a>
        <p class="text-center text-white mb-0">&copy; 2025 CineBook</p>
    </div>
</nav>