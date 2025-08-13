<?php
// Login Process
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['adminname']) && isset($_POST['adminPassword'])) {

        // Database Connection
        require 'includes/dbconnection.php';

        // Collecting Form Data
        $adminname = $_POST['adminname'];
        $adminPassword = $_POST['adminPassword'];

        $sql_query = "SELECT * FROM admin WHERE admin_name = '$adminname' AND admin_password = '$adminPassword'";
        $result = mysqli_query($con, $sql_query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['adminname'] = $adminname;

            // If "Remember Me" is checked, set cookie for 7 days
            if (isset($_POST['remember'])) {
                setcookie('adminname', $adminname, time() + (7 * 24 * 60 * 60), "/");
            }

            // Redirect to home
            echo "<script>
                alert('Welcome to Admin Dashboard');
                window.location.href = 'dashboard.php';
            </script>";
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password!'); window.location.href = 'admin_login.php';</script>";
            exit();
        }

        $con->close();
    }
}
