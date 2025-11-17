<?php
session_start();
require 'includes/dbconnection.php';

// ===== Update booking status if admin takes action =====
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $status = ($_GET['action'] == 'approve') ? 'Approved' : 'Cancelled';
    mysqli_query($con, "UPDATE bookings SET booking_status='$status' WHERE booking_id='$id'");
    header("Location: manage_bookings.php");
    exit;
}

// ===== Fetch bookings along with payment info =====
$query = "
    SELECT 
        b.*, 
        u.username, 
        m.title, 
        s.show_date, 
        s.show_time, 
        t.theater_name,
        p.payment_method,
        p.payment_status,
        p.payment_message
    FROM bookings b
    JOIN users u ON b.user_id = u.user_id
    JOIN movies_details m ON b.movie_id = m.movie_id
    JOIN showtimes s ON b.show_id = s.show_id
    JOIN theaters t ON s.theater_id = t.theater_id
    LEFT JOIN payments p ON b.booking_id = p.booking_id
    ORDER BY b.booking_id DESC
";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Manage Bookings</title>

    <!-- Bootstrap + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <main class="d-flex">

        <!-- Navbar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Manage Booking Section -->
        <section class="content-area flex-grow-1" style="margin-left: 260px; padding: 20px;">
            <section class="container my-5 px-4" style="width: 80rem;">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 text-primary">
                    <h1 class="fw-bold text-uppercase mb-3 mb-md-0">
                        <i class="fa-solid fa-ticket me-2"></i> Manage Bookings
                    </h1>
                </div>

                <div class="table-responsive shadow rounded border">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark text-center align-middle">
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
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <?php
                                $booking_id = $row['booking_id'];
                                $username = htmlspecialchars($row['username']);
                                $movie_title = htmlspecialchars($row['title']);
                                $show_date = $row['show_date'];
                                $show_time = date("h:i A", strtotime($row['show_time']));
                                $theater_name = htmlspecialchars($row['theater_name']);
                                $seat_row = $row['seat_row'];
                                $total_seat = $row['total_seat'];
                                $amount = number_format($row['amount'], 2);
                                $booking_status = $row['booking_status'];
                                $payment_method = $row['payment_method'] ?? 'N/A';
                                $payment_status = $row['payment_status'] ?? 'Pending';
                                $payment_message = $row['payment_message'] ?? '';
                                ?>

                                <tr>
                                    <td><?= $booking_id ?></td>
                                    <td><?= $username ?></td>
                                    <td><?= $movie_title ?></td>
                                    <td><?= $show_date ?></td>
                                    <td><?= $show_time ?></td>
                                    <td><?= $theater_name ?></td>
                                    <td><?= $seat_row ?> - <?= $total_seat ?></td>
                                    <td class="fw-semibold text-success">₹<?= $amount ?></td>

                                    <!-- Booking Status -->
                                    <td>
                                        <?php
                                        $status_badge = match ($booking_status) {
                                            'Pending' => 'bg-warning text-dark',
                                            'Approved' => 'bg-success',
                                            'Cancelled' => 'bg-danger',
                                            default => 'bg-secondary'
                                        };
                                        ?>
                                        <span class="badge <?= $status_badge ?> px-3 py-2 fw-semibold"><?= $booking_status ?></span>
                                    </td>

                                    <!-- Payment Method -->
                                    <td>
                                        <?php
                                        $method_badge = match ($payment_method) {
                                            'UPI' => 'bg-success',
                                            'Card' => 'bg-info text-dark',
                                            'Cash' => 'bg-secondary',
                                            default => 'bg-light text-dark'
                                        };
                                        ?>
                                        <span class="badge <?= $method_badge ?> px-3 py-2 fw-semibold"><?= $payment_method ?></span>
                                    </td>

                                    <!-- Payment Status -->
                                    <td>
                                        <?php
                                        $payment_badge = match ($payment_status) {
                                            'Confirmed' => 'bg-success',
                                            'Pending' => 'bg-warning text-dark',
                                            'Failed' => 'bg-danger',
                                            default => 'bg-secondary'
                                        };
                                        ?>
                                        <span class="badge <?= $payment_badge ?> px-3 py-2 fw-semibold"><?= $payment_status ?></span>
                                    </td>

                                    <!-- Actions -->
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
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </main>

</body>

</html>