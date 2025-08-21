<?php
// Login Process
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {

        // Database Connection
        require 'includes/dbconnection.php';

        // Collecting Form Data
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql_query = "select * from users where username = '$username' and user_password = '$password'";
        $result = mysqli_query($con, $sql_query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Store BOTH username and user_id in session
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id']  = $row['user_id'];

            // If "Remember Me" is checked, set cookie for 7 days
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (7 * 24 * 60 * 60), "/");
            }

            // Redirect to home
            echo "<script>
                alert('Welcome to CineBook');
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
