<!-- If user is not Logged In to Website -->
<?php
session_start();

// If session not set but cookie exists, restore session
if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

// If neither session nor cookie, redirect to login
if (!isset($_SESSION['username'])) {
    echo "<script>
        alert('Please, Login to Access CineBook');
        window.location.href = 'login.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- User Profile Section -->
    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            <!-- Header Section -->
            <div class="card-header bg-gradient text-white text-center py-4" style="background: linear-gradient(90deg, #4a90e2, #9013fe);">
                <div class="user-icon mb-2">
                    <i class="fa-solid fa-user-circle fa-6x text-dark"></i>
                </div>
                <?php
                require 'includes/dbconnection.php';

                if (isset($_GET['user_id'])) {
                    $user_id = intval($_GET['user_id']);
                    $sql_query = "SELECT * FROM users WHERE user_id = $user_id";
                    $result = mysqli_query($con, $sql_query);

                    if (mysqli_num_rows($result) > 0) {
                        $rows = mysqli_fetch_assoc($result);
                        $fullname = $rows['fullname'];
                        $username = $rows['username'];
                        $email = $rows['email'];

                        echo "
                        <h3 class='fw-bold mb-1 text-dark'>$fullname</h3>
                        <p class='m-0 text-dark'>$email</p>
                        <p class='text-light small text-dark'><i class='fa-solid fa-user '></i> @$username</p>
                    ";
                    } else {
                        echo "<p class='text-light'>User not found.</p>";
                    }
                }
                ?>
            </div>

            <!-- Body Section -->
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3 text-primary"><i class="fa-solid fa-id-card me-2"></i>Personal Information</h4>
                <hr>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light">
                            <h6 class="fw-bold text-secondary mb-1">Full Name</h6>
                            <p class="mb-0"><?php echo $fullname ?? 'N/A'; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light">
                            <h6 class="fw-bold text-secondary mb-1">Email ID</h6>
                            <p class="mb-0"><?php echo $email ?? 'N/A'; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 bg-light">
                            <h6 class="fw-bold text-secondary mb-1">Username</h6>
                            <p class="mb-0">@<?php echo $username ?? 'N/A'; ?></p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="text-end mt-4">
                    <button class="btn btn-success px-4" data-bs-toggle="modal" data-bs-target="#updateProfile<?php echo $user_id; ?>">
                        <i class="fa-solid fa-pen-to-square me-2"></i>Update Profile
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Profile Modal -->
    <div class="modal fade" id="updateProfile<?php echo $user_id; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4">
                <div class="modal-header bg-primary text-white border-0 rounded-top-4">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-user-pen me-2"></i>Update Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="controllers/update-process.php" method="post"> <!-- ✅ moved here -->
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form> <!-- ✅ form ends here -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>