<?php

require '../includes/dbconnection.php';

if (isset($_GET['theater_id'])) {
    $theater_id = $_GET['theater_id'];

    $sql_query = "delete from theaters where theater_id = '$theater_id'";
    $result = mysqli_query($con, $sql_query);

    if (mysqli_affected_rows($con) > 0) {
        echo "<script>
                alert('Theater Deleted Successfully.');
                window.location.href = '../manage_theaters.php';
            </script>";
        exit();
    }
}
