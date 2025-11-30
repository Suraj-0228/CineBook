<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['theater_name'])) {

        // Database Connection
        require '../includes/dbconnection.php';

        // Collecting Form Data
        $theater_name     = trim($_POST['theater_name']);
        $ticket_price     = trim($_POST['ticket_price']);
        $theater_location = trim($_POST['theater_location']);

        // Basic Validation: all fields filled + price numeric
        if (
            !empty($theater_name) &&
            !empty($ticket_price) &&
            !empty($theater_location) &&
            is_numeric($ticket_price)
        ) {

            $sql_query = "
                INSERT INTO theaters (theater_name, ticket_price, theater_location)
                VALUES ('$theater_name', '$ticket_price', '$theater_location')
            ";

            if ($con->query($sql_query) === TRUE) {
                echo "<script>
                        alert('Theater inserted successfully.');
                        window.location.href = '../manage_theaters.php';
                      </script>";
            } else {
                echo "<script>alert('ERROR: Theater inserting failed!!!');</script>";
                echo 'Error: ' . $con->error;
            }
        } else {
            echo "<script>
                    alert('ERROR: Please fill all details and enter a valid numeric ticket price.');
                    window.location.href = '../add_theater.php';
                  </script>";
        }

        $con->close();
    }
}
