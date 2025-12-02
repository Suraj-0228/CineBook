<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieMate - Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/profile.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.svg" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- User Profile Section -->
    <?php
    require 'includes/dbconnection.php';

    // use session or GET (fallback)
    $user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : ($_SESSION['userid'] ?? 0);

    $fullname = $username = $email = '';
    $user_found = false;

    if ($user_id > 0) {
        $sql_query = "SELECT * FROM users WHERE user_id = $user_id";
        $result = mysqli_query($con, $sql_query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row      = mysqli_fetch_assoc($result);
            $fullname = $row['fullname'];
            $username = $row['username'];
            $email    = $row['email'];
            $user_found = true;
        }
    }

    // Count total bookings of logged-in user
    $countQuery = "SELECT COUNT(*) AS total FROM bookings WHERE user_id = $user_id";
    $countResult = mysqli_query($con, $countQuery);
    $countRow = mysqli_fetch_assoc($countResult);

    $total_bookings = $countRow['total'];
    ?>

    <section class="cb-profile-section p-lg-5 p-4">
        <?php if (!$user_found): ?>
            <div class="alert alert-danger text-center rounded-4">
                User not found. Please try again.
            </div>
        <?php else: ?>
            <div class="row g-4">
                <div class="col-md-4 col-lg-3">
                    <div class="card cb-profile-sidebar border-0 shadow-lg">
                        <div class="card-body text-center p-5">
                            <div class="cb-avatar mx-auto mb-3 d-flex align-items-center justify-content-center">
                                <span class="cb-avatar-text">
                                    <?= strtoupper(substr($fullname, 0, 1)) ?>
                                </span>
                            </div>
                            <h5 class="mb-1 text-dark fw-semibold"><?= htmlspecialchars($fullname) ?></h5>
                            <p class="mb-3  text-muted"><?= htmlspecialchars($email) ?></p>
                            <ul class="list-unstyled text-start mt-3 mb-0">
                                <li class="cb-sidebar-link mb-2">
                                    <a href="my-booking.php" class="bg-primary px-3 py-2 text-white text-decoration-none d-block rounded fw-semibold">
                                        <i class="fa-solid fa-ticket me-2"></i> My Bookings
                                    </a>
                                </li>
                                <li class="cb-sidebar-link mb-2">
                                    <a href="#" class="bg-primary px-3 py-2 text-white text-decoration-none d-block rounded fw-semibold">
                                        <i class="fa-solid fa-user-gear me-2"></i> Profile Settings
                                    </a>
                                </li>
                                <li class="cb-sidebar-link mt-3">
                                    <a href="logout.php" class="bg-danger px-3 py-2 text-white text-decoration-none d-block rounded fw-semibold"
                                        onclick="return confirm('Are you sure you want to log out?');">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="card cb-profile-main rounded-3 shadow-lg mb-4">
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                                <h2 class="mb-0 mt-2 text-dark fw-semibold text-uppercase">My Profile Info</h2>
                                <button
                                    class="bg-success px-3 py-2 text-white text-center text-decoration-none border-0 rounded-5 fw-semibold"
                                    data-bs-toggle="modal"
                                    data-bs-target="#updateProfile<?= $user_id; ?>">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit Profile
                                </button>
                            </div>
                            <hr class="divider mb-4">
                            <div class="">
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center py-3">
                                    <div class="d-flex align-items-center mb-2 mb-md-0">
                                        <h5 class="me-2">
                                            <i class="fa-solid fa-user"></i>
                                        </h5>
                                        <h5 class="">Full Name</h5>
                                    </div>
                                    <div class="text-md-end">
                                        <?= htmlspecialchars($fullname) ?: 'N/A' ?>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center py-3">
                                    <div class="d-flex align-items-center mb-2 mb-md-0">
                                        <h5 class="me-2">
                                            <i class="fa-solid fa-user-tag"></i>
                                        </h5>
                                        <h5 class="">Username</h5>
                                    </div>
                                    <div class="text-md-end">
                                        @<?= htmlspecialchars($username) ?: 'N/A' ?>
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center py-3">
                                    <div class="d-flex align-items-center mb-2 mb-md-0">
                                        <h5 class="me-2">
                                            <i class="fa-solid fa-envelope"></i>
                                        </h5>
                                        <h5 class="">Email</h5>
                                    </div>
                                    <div class="text-md-end">
                                        <?= htmlspecialchars($email) ?: 'N/A' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-6">
                            <div class="card border-0 h-100 card-tall">
                                <div class="card-body d-flex flex-column p-5">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-ticket fa-2xl text-primary"></i>
                                            <h4 class="fw-semibold text-primary ms-2 mt-2">Total Bookings</h4>
                                        </div>
                                        <h4 class="fw-semibold bg-primary text-white px-3 py-2 rounded-5">
                                            <?= $total_bookings ?>
                                        </h4>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="text-dark fw-semibold mb-1">My Bookings</h6>
                                        <p class="text-muted mb-0">
                                            Quickly access your past and upcoming movie tickets in one place.
                                        </p>
                                    </div>
                                    <div class="mt-auto">
                                        <a href="my-booking.php"
                                            class="bg-primary px-3 py-2 text-white text-center text-decoration-none d-block rounded-5 fw-semibold">
                                            View Bookings
                                            <i class="fa-solid fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card border-0 h-100 card-tall">
                                <div class="card-body d-flex flex-column p-5">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-headset fa-2xl text-danger"></i>
                                            <h4 class="fw-semibold text-danger ms-2 mt-2">Contact/Support</h4>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h6 class="text-dark fw-semibold mb-1">Help & Support</h6>
                                        <p class="text-muted mb-0">
                                            Need assistance with a booking or payment? We’re here to help.
                                        </p>
                                    </div>
                                    <div class="mt-auto">
                                        <a href="contact.php"
                                            class="bg-danger px-3 py-2 text-white text-center text-decoration-none d-block rounded-5 fw-semibold">
                                            Contact
                                            <i class="fa-solid fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
    </section>

    <!-- Update Profile Modal -->
    <div class="modal fade" id="updateProfile<?php echo $user_id; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4">
                <div class="modal-header payment-header text-white border-0 rounded-top-4">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-user-pen me-2"></i>Update Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controllers/update-users.php" method="post">
                    <div class="modal-body p-4">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control" name="fullname1" value="<?php echo $fullname; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email ID</label>
                            <input type="email" class="form-control" name="email1" value="<?php echo $email; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Username</label>
                            <input type="text" class="form-control" name="username1" value="<?php echo $username; ?>">
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="bg-danger text-white border-0 rounded px-5 py-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="bg-success text-white border-0 rounded px-5 py-2">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>