<?php
session_start();

// If session not set but cookie exists, restore session
if (!isset($_SESSION['adminname']) && isset($_COOKIE['adminname'])) {
    $_SESSION['adminname'] = $_COOKIE['adminname'];
}

// If neither session nor cookie, redirect to login
if (!isset($_SESSION['adminname'])) {
    echo "<script>
        alert('Please, Login to Access CineBook Admin');
        window.location.href = 'admin_login.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header1.php'; ?>

    <!-- Display & Manage Users -->
    <div class="container">
        <div class="my-4">
            <h1 class="fw-bold">Manage Users:</h1>
            <hr class="border border-dark">
        </div>
        <?php
        require 'includes/dbconnection.php';

        $sql_query = "select * from users";
        $result = mysqli_query($con, $sql_query);

        while ($rows = mysqli_fetch_assoc($result)) {
            $user_id = $rows['user_id'];
            $fullname = $rows['fullname'];
            $email = $rows['email'];
            $username = $rows['username'];
            $user_password = $rows['user_password'];
            $created_at = $rows['created_at'];

            echo "
                <div class='card shadow my-3'>
                    <div class='row g-0 align-items-center border-0'>
                        <div class='col-12 col-md-8'>
                        <div class='card-body'>
                                <p class='mb-1'><strong>User ID:</strong> $user_id</p>
                                <p class='mb-1'><strong>Full Name:</strong> $fullname</p>
                                <p class='mb-1'><strong>Email ID:</strong> $email</p>
                                <p class='mb-1'><strong>User Name:</strong> $username</p>
                                <p class='mb-1'><strong>User Password:</strong> $user_password</p>
                                <p class='mb-1'><strong>Created At:</strong> $created_at</p>
                                <div class='btn-group mt-3'>
                                    <a href='controllers/delete-process.php?user_id=$user_id' class='bg-danger text-white rounded p-2 px-4 mx-1'>
                                        <i class='fa-solid fa-trash'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        ?>
    </div>


    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>