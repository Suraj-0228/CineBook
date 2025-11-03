<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {

        require 'includes/dbconnection.php';

        // Get form input
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Check for admin login (static credentials) ----
        $admin_username = 'Admin';
        $admin_password = 'adminPassword';

        if ($username === $admin_username && $password === $admin_password) {
            $_SESSION['adminname'] = $admin_username;

            echo "<script>
                alert('Welcome to Admin Dashboard.');
                window.location.href = 'admin/index.php';
            </script>";
            exit();
        }

        // Check for normal user login (from database) ----
        $sql_query = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password'";
        $result = mysqli_query($con, $sql_query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Store user details in session
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id']  = $row['user_id'];

            // "Remember Me" option
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (7 * 24 * 60 * 60), "/");
            }

            echo "<script>
                alert('Welcome to CineBook, $username!');
                window.location.href = 'home.php';
            </script>";
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password!'); window.location.href = 'login.php';</script>";
            exit();
        }

        $con->close();
    }
}
