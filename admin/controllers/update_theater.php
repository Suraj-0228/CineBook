<?php
require '../includes/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theater_id'])) {

    $theater_id       = (int) $_POST['theater_id'];
    $theater_name     = trim($_POST['theater_name']);
    $theater_location = trim($_POST['theater_location']);
    $ticket_price     = trim($_POST['ticket_price']);

    if (!empty($theater_name) && !empty($theater_location) && !empty($ticket_price) && is_numeric($ticket_price)) {

        $sql = "
            UPDATE theaters
            SET theater_name = '$theater_name',
                theater_location = '$theater_location',
                ticket_price = '$ticket_price'
            WHERE theater_id = $theater_id
        ";

        if (mysqli_query($con, $sql)) {
            echo "<script>
                    alert('Theater updated successfully.');
                    window.location.href = '../manage_theaters.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating theater.');
                    window.location.href = '../manage_theaters.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Please fill all fields with valid data.');
                window.location.href = '../update_theater.php?theater_id=$theater_id';
              </script>";
    }

    exit;
}
