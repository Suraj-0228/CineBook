<?php

require '../includes/dbconnection.php';

if (isset($_GET['movie_id'])) {
    $movie_id = $_GET['movie_id'];

    $sql_query = "delete from movies_details where movie_id = '$movie_id'";
    $result = mysqli_query($con, $sql_query);

    if (mysqli_affected_rows($con) > 0) {
        echo "<script>
                alert('Movie Deleted Successfully.');
                window.location.href = '../manage_movies.php';
            </script>";
        exit();
    }
}
