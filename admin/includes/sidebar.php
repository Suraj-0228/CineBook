<!-- Sidebar -->
<nav class="navbar navbar-dark bg-dark d-flex flex-column justify-content-between vh-100 p-3 shadow" style="width: 280px;">

    <!-- Top Section -->
    <div class="w-100">
        <!-- Logo / Title -->
        <a href="index.php" class="navbar-brand d-flex align-items-center justify-content-center">
            <h4 class="fw-bold text-white">Admin Panel</h4>
        </a>
        <hr class="text-secondary mt-0 mb-4">

        <!-- Navigation Links -->
        <ul class="navbar-nav flex-column">
            <li class="nav-item mb-2">
                <a href="index.php" class="nav-link text-white d-flex align-items-center py-2 px-3 rounded hover-effect">
                    <i class="fa fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_movies.php" class="nav-link text-white d-flex align-items-center py-2 px-3 rounded hover-effect">
                    <i class="fa fa-film me-2"></i> Manage Movies
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_bookings.php" class="nav-link text-white d-flex align-items-center py-2 px-3 rounded hover-effect">
                    <i class="fa fa-ticket me-2"></i> Manage Bookings
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="manage_users.php" class="nav-link text-white d-flex align-items-center py-2 px-3 rounded hover-effect">
                    <i class="fa fa-user me-2"></i> Manage Users
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout & Footer -->
    <div class="w-100 mt-auto text-center">
        <a href="admin_logout.php"
            class="d-inline-block bg-danger text-white fw-semibold text-decoration-none rounded px-4 py-2 mb-2 border border-light shadow-sm w-100"
            onclick="return confirm('Are You Sure?? You want to Logout!!');">
            <i class="fa fa-sign-out-alt me-2"></i> Logout
        </a>
        <p class="text-center text-secondary small mb-0 opacity-75">
            &copy; 2025 <strong>CineBook</strong>
        </p>
    </div>

</nav>