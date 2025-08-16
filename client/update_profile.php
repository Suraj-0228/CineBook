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
    <title>CineBook - Update Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Update Movies Form -->
    <div class="container py-5 ">
        <div class="card border-0 shadow p-4">
            <h1 class="text-center fw-bold">Update Profile:</h1>
            <hr class="border border-dark mb-4">
            <form action="controllers/update-process.php" method="post">
                <?php
                require 'includes/dbconnection.php';

                $id = $_GET['user_id'];

                $sql_query = "select * from users where user_id = '$id'";
                $result = mysqli_query($con, $sql_query);

                while ($rows = mysqli_fetch_assoc($result)) {
                    $id = $rows['user_id'];
                    $fullname = $rows['fullname'];
                    $email = $rows['email'];
                    $username = $rows['username'];
                };
                ?>
                <div class="mb-3">
                    <label for="fullname" class="form-label fw-bold">Enter Your Full Name:</label>
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $id; ?>">
                    <input type="text" class="form-control" name="fullname1" id="fullname1" placeholder="Enter Your Full Name...." value="<?php echo $fullname; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email ID:</label>
                    <input type="email" class="form-control" name="email1" id="email1" placeholder="Enter Your Email...." value="<?php echo $email; ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">User Name:</label>
                    <input type="text" class="form-control" name="username1" id="username1" value="<?php echo $username; ?>">
                </div>
                <button type="submit" class="btn">Update Profile</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>