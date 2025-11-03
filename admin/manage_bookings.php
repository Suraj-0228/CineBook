<?php
session_start();
require 'includes/dbconnection.php';

// Update status if action clicked
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $status = $_GET['action'] == 'approve' ? 'Approved' : 'Cancelled';
    mysqli_query($con, "UPDATE bookings SET booking_status='$status' WHERE booking_id='$id'");
    header("Location: manage_bookings.php");
    exit;
}

$query = "SELECT b.*, u.username, m.title, s.show_date, s.show_time, t.theater_name FROM bookings b
          JOIN users u ON b.user_id = u.user_id
          JOIN movies_details m ON b.movie_id = m.movie_id
          JOIN showtimes s ON b.show_id = s.show_id
          JOIN theaters t ON s.theater_id = t.theater_id 
          order by b.booking_id desc";

$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Manage Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

    <main class="d-flex">

        <!-- Navbar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Manage All Bookings -->
        <section class="container p-5">
            <h1 class="fw-bold mb-3">Manage Bookings:</h1>
            <hr>
            <table class="table table-bordered table-striped table-hover align-middle shadow">
                <thead class="text-center">
                    <tr>
                        <th>Booking ID</th>
                        <th>Username</th>
                        <th>Movie Title</th>
                        <th>Show Date</th>
                        <th>Show Time</th>
                        <th>Theater</th>
                        <th>Seat</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $booking_id = $row['booking_id'];
                        $username = $row['username'];
                        $movie_title = $row['title'];
                        $show_date = $row['show_date'];
                        $show_time = $row['show_time'];
                        $theater_name = $row['theater_name'];
                        $seat_row = $row['seat_row'];
                        $total_seat = $row['total_seat'];
                        $amount = $row['amount'];
                        $payment_method = $row['payment_method'];
                        $booking_status = $row['booking_status'];
                    ?>
                        <tr class="text-center">
                            <td><?= $booking_id ?></td>
                            <td><?= $username ?></td>
                            <td><?= $movie_title ?></td>
                            <td><?= $show_date ?></td>
                            <td><?= $show_time ?></td>
                            <td><?= $theater_name ?></td>
                            <td><?= $seat_row ?> - <?= $total_seat ?></td>
                            <td>₹<?= $amount ?></td>
                            <td>
                                <?php
                                if ($booking_status == 'Pending') {
                                    echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                } elseif ($booking_status == 'Approved') {
                                    echo "<span class='badge bg-success'>Approved</span>";
                                } else {
                                    echo "<span class='badge bg-danger'>Cancelled</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($payment_method == 'UPI') {
                                    echo "<span class='badge bg-success'>$payment_method</span>";
                                } elseif ($payment_method == 'Card') {
                                    echo "<span class='badge bg-info'>$payment_method</span>";
                                } else {
                                    echo "<span class='badge bg-secondary'>$payment_method</span>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php if ($booking_status == 'Pending') { ?>
                                    <a href="?action=approve&id=<?= $booking_id ?>" class="text-success text-decoration-none btn-sm mx-1">
                                        <i class="fa-solid fa-check"></i> Approve
                                    </a>
                                    <br>
                                    <a href="?action=cancel&id=<?= $booking_id ?>" class="text-danger text-decoration-none btn-sm mx-1">
                                        <i class="fa-solid fa-xmark"></i> Cancel
                                    </a>
                                <?php } else { ?>
                                    <span class="text-muted">No Actions</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>