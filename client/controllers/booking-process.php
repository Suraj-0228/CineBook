<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['movietitle'])) {

        require 'includes/dbconnection.php';

        // Check if user is logged in
        if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
            echo "<script>alert('ERROR: You must be logged in to book a movie!'); window.location.href='login.php';</script>";
            exit();
        }
        $user_id = $_SESSION['user_id'];

        // Get other form data
        $date   = mysqli_real_escape_string($con, $_POST['moviedate']);
        $time   = mysqli_real_escape_string($con, $_POST['movietime']);
        $ticket = mysqli_real_escape_string($con, $_POST['ticket']);
        $method = mysqli_real_escape_string($con, $_POST['paymentmethod']);
        $status = mysqli_real_escape_string($con, $_POST['paymentstatus']);

        // Get movie_id from POST (dropdown value is movie_id)
        $movie_id = mysqli_real_escape_string($con, $_POST['movietitle']);

        // Get movie title from DB using movie_id
        $movie_query = mysqli_query($con, "SELECT title FROM movies_details WHERE movie_id = '$movie_id' LIMIT 1");
        if (!$movie_query || mysqli_num_rows($movie_query) === 0) {
            echo "<script>alert('Selected Movie not Found in Database!');</script>";
            exit();
        }
        $movie_row = mysqli_fetch_assoc($movie_query);
        $title = $movie_row['title'];

        // Validate required fields
        if (!empty($movie_id) && !empty($title) && !empty($date) && !empty($time) && !empty($ticket) && !empty($method) && !empty($status)) {

            // Insert booking with both movie_id and movie_title
            $sql_query = "INSERT INTO booking(user_id, movie_id, movie_title, show_date, show_time, tickets, payment_method, payment_status) 
                          VALUES('$user_id', '$movie_id', '$title', '$date', '$time', '$ticket', '$method', '$status')";

            $result = mysqli_query($con, $sql_query);

            if ($result && mysqli_affected_rows($con) >= 1) {
                echo "<script>alert('Movie Booking Successful.');</script>";
            } else {
                die("MySQL Error: " . mysqli_error($con));
            }
        } else {
            echo "<script>alert('ERROR: Please, Enter All the Details Correctly!');</script>";
        }

        mysqli_close($con);
    }
}
