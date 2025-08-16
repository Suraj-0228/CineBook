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

    <!-- Display Users Profile -->
    <div class="container my-4">
        <div class="card p-4 pb-0 shadow-sm">
            <div class="row align-items-center">
                <!-- User Icon -->
                <div class="col-12 col-sm-1 text-center text-sm-start mb-3 mb-sm-0">
                    <div class="user-photo">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                </div>

                <!-- User Data -->
                <div class="col-12 col-sm-11">
                    <div class="user-data">
                        <?php
                        require 'includes/dbconnection.php';

                        if (isset($_GET['user_id'])) {
                            $user_id = intval($_GET['user_id']);

                            $sql_query = "SELECT * FROM users WHERE user_id = $user_id";
                            $result = mysqli_query($con, $sql_query);

                            if (mysqli_num_rows($result) > 0) {
                                $rows = mysqli_fetch_assoc($result);

                                $fullname = $rows['fullname'];   // Correct field
                                $username = $rows['username'];
                                $email = $rows['email'];

                                echo "
                                <p class='fw-bold m-0 fs-5'>$username</p>
                                <p class='text-muted m-0'>$email</p>
                            ";
                            } else {
                                echo "<p class='text-muted'>User not found.</p>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Personal Information Section -->
            <div class="user-information mt-4">
                <h3 class="fw-bold text-center text-md-center">Your Personal Information</h3>
                <hr class="border border-dark">
                <div class="user-info col-12 col-sm-11">
                    <div class="user-data my-4">
                        <div class="user-fullname">
                            <h5 class="form-label fw-bold fs-5 m-0">Full Name:</h5>
                            <p class=""><?php echo $fullname ?? ''; ?></p>
                        </div>
                        <div class="user-eamil">
                            <h5 class="form-label fw-bold fs-5 m-0">Email ID:</h5>
                            <p class=""><?php echo $email ?? ''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>