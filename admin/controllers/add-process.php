<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title'])) {

        // Database Connection
        require '../includes/dbconnection.php';

        // Collecting Form Data
        $movie_title = $_POST['title'];
        $language = $_POST['language'];
        $release_date = $_POST['release_date'];
        $genre = $_POST['genre'];
        $rating = $_POST['rating'];
        $poster = $_POST['poster_url'];
        $description = $_POST['description'];


        // Check that all fields are filled
        if (
            !empty($movie_title) && !empty($language) && !empty($release_date) && !empty($genre) &&
            !empty($rating) && !empty($poster) && !empty($description)
        ) {
            $sql_query = "insert into movies_details (title, language, release_date, genre, rating, poster_url, description) 
                        VALUES ('$movie_title', '$language', '$release_date', '$genre', '$rating', '$poster', '$description')";
            // $result = mysqli_query($con, $sql_query);

            if ($con->query($sql_query) === TRUE) {
                echo "<script>
                            alert('Movie Inserted Successfully.');
                            window.location.href = '../manage_movies.php';
                        </script>";
            } else {
                echo "<script>alert('ERROR: Movie Inserting Failed!!!');</script>";
                echo "Error: " . $con->error;
            }
        } else {
            echo "<script>alert('ERROR: Please, Fill all the Details.'); window.location.href = '../add_movie.php';</script>";
        }

        $con->close();
    }
}
