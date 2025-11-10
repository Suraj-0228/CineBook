<?php

require '../includes/dbconnection.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql_query = "delete from users where user_id = '$user_id'";
    $result = mysqli_query($con, $sql_query);

    if (mysqli_affected_rows($con) > 0) {
        echo "<script>
                alert('User Deleted Successfully.');
                window.location.href = '../index.php';
            </script>";
        exit();
    }
}
