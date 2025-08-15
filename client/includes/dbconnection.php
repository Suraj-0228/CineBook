<?php

// Establishing the Connection with Database
$server = "localhost";
$username = "root";
$password = "";
$database = "database1";

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>