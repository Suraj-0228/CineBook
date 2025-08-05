<?php
//Login Process
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {

        // Database Connection
        require 'dbconnection.php';

        // Collecting Form Data
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql_query = "SELECT * FROM register WHERE User_Name = '$username' AND password = '$password'";
        $result = mysqli_query($con, $sql_query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit();
        }
        $con->close();
    }
}

?>