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

    <main class="d-flex">

        <!-- Navbar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Display & Manage Users -->
        <div class="container p-5">
            <div class="">
                <h1 class="fw-bold">Manage Users:</h1>
                <hr class="border border-dark">
            </div>

            <table class="table table-bordered table-striped table-hover align-middle shadow">
                <thead class="text-center">
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'includes/dbconnection.php';
                    $sql_query = "SELECT * FROM users";
                    $result = mysqli_query($con, $sql_query);

                    while ($rows = mysqli_fetch_assoc($result)) {
                        $user_id = $rows['user_id'];
                        $fullname = $rows['fullname'];
                        $email = $rows['email'];
                        $username = $rows['username'];
                        $user_password = $rows['user_password'];
                        $created_at = $rows['created_at'];
                    ?>
                        <tr class="text-center">
                            <td><?= $user_id ?></td>
                            <td><?= $fullname ?></td>
                            <td><?= $email ?></td>
                            <td><?= $username ?></td>
                            <td><?= $user_password ?></td>
                            <td><?= $created_at ?></td>
                            <td>
                                <a href="controllers/delete-process.php?user_id=<?= $user_id ?>" class="text-danger text-decoration-none btn-sm mx-1">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>