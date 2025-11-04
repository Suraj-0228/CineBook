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
</head>

<body>

    <main class="d-flex">

        <!-- Navbar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Manage All Bookings -->
        <section class="container my-5 px-5">
            <div class="d-flex flex-column text-primary flex-md-row justify-content-between align-items-center mb-4">
                <h1 class="fw-bold text-uppercase mb-3 mb-md-0">
                    <i class="fa-solid fa-ticket me-2"></i> Manage Bookings
                </h1>
            </div>
            <div class="table-responsive shadow rounded border">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark text-center">
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
                            <th>Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
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
                            <tr>
                                <td><?= $booking_id ?></td>
                                <td><?= htmlspecialchars($username) ?></td>
                                <td><?= htmlspecialchars($movie_title) ?></td>
                                <td><?= $show_date ?></td>
                                <td><?= $show_time ?></td>
                                <td><?= htmlspecialchars($theater_name) ?></td>
                                <td><?= $seat_row ?> - <?= $total_seat ?></td>
                                <td class="fw-semibold text-success">₹<?= number_format($amount, 2) ?></td>
                                <td>
                                    <?php
                                    $status_badge = match ($booking_status) {
                                        'Pending' => 'bg-warning text-dark',
                                        'Approved' => 'bg-success',
                                        default => 'bg-danger'
                                    };
                                    ?>
                                    <span class="badge <?= $status_badge ?> px-3 py-2 fw-semibold"><?= $booking_status ?></span>
                                </td>
                                <td>
                                    <?php
                                    $payment_badge = match ($payment_method) {
                                        'UPI' => 'bg-success',
                                        'Card' => 'bg-info text-dark',
                                        default => 'bg-secondary'
                                    };
                                    ?>
                                    <span class="badge <?= $payment_badge ?> px-3 py-2"><?= $payment_method ?></span>
                                </td>
                                <td>
                                    <?php if ($booking_status === 'Pending'): ?>
                                        <div class="d-flex flex-column align-items-center gap-1">
                                            <a href="?action=approve&id=<?= $booking_id ?>"
                                                class="text-success text-decoration-none fw-semibold">
                                                <i class="fa-solid fa-check me-1"></i> Approve
                                            </a>
                                            <a href="?action=cancel&id=<?= $booking_id ?>"
                                                class="text-danger text-decoration-none fw-semibold">
                                                <i class="fa-solid fa-xmark me-1"></i> Cancel
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-muted small">No Actions</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

</body>

</html>