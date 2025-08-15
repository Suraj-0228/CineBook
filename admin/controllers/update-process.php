<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title1'])) {

        require '../includes/dbconnection.php';

        $id = mysqli_real_escape_string($con, $_POST['movie_id']);
        $title = mysqli_real_escape_string($con, $_POST['title1']);
        $genre = mysqli_real_escape_string($con, $_POST['genre1']);
        $rating = mysqli_real_escape_string($con, $_POST['rating1']);
        $description = mysqli_real_escape_string($con, $_POST['description']);

        $sql_query = "update movies_details set title = '$title', genre = '$genre', 
            rating = '$rating', description = '$description' where movie_id = $id";
        $result = mysqli_query($con, $sql_query);

        if (mysqli_affected_rows($con)) {
            echo "<script>
                    alert('Record Updated Successfully.');
                    window.location.href = '../manage_movies.php';
                </script>";
        } else {
            echo "<script>
                    alert('Record Updating Failed!!!!');
                    window.location.href = '../update_movie.php';
                </script>";
        }
        $con->close();
    }
}
