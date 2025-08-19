<?php
session_start();
require 'includes/dbconnection.php';

// Fetch Movie Title
$movie_id = $_GET['movie_id'] ?? 0;
$movie_title = "";
$result = mysqli_query($con, "SELECT title FROM movies_details WHERE movie_id = '$movie_id'");
if ($result && mysqli_num_rows($result) > 0) {
    $movie_title = mysqli_fetch_assoc($result)['title'];
}

// Fetch all shows for this movie
$shows = [];
$sql_query = "SELECT s.show_id, s.show_date, s.show_time, t.theater_name, t.theater_location, t.ticket_price
              FROM showtimes s JOIN theaters t ON s.theater_id = t.theater_id
              WHERE s.movie_id = '$movie_id'";
$sql_result = mysqli_query($con, $sql_query);
if ($sql_result && mysqli_num_rows($sql_result) > 0) {
    while ($rows = mysqli_fetch_assoc($sql_result)) {
        $shows[] = $rows;
    }
}

// Initialize
$ticket_price = 0;
$amount = 0;

// Get POST values
$selected_show_id = $_POST['show_id'] ?? 0;
$totalSeat = $_POST['totalSeat'] ?? 0;

// Fetch ticket price based on selected show
if ($selected_show_id > 0) {
    $price_query = "SELECT t.ticket_price FROM showtimes s JOIN theaters t ON s.theater_id = t.theater_id
                    WHERE s.show_id = '$selected_show_id'
                    LIMIT 1";
    $price_result = mysqli_query($con, $price_query);
    if ($price_result && mysqli_num_rows($price_result) > 0) {
        $ticket_price = mysqli_fetch_assoc($price_result)['ticket_price'];
    }
}
