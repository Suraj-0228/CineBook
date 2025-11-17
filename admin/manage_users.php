<?php
session_start();

// If session not set but cookie exists, restore session
if (!isset($_SESSION['adminname']) && isset($_COOKIE['adminname'])) {
    $_SESSION['adminname'] = $_COOKIE['adminname'];
}

// If neither session nor cookie, redirect to login
if (!isset($_SESSION['adminname'])) {
    echo "<script>
        alert('Please, Login to Access CineBook Admin');
        window.location.href = '../login.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <main class="d-flex">

        <!-- Navbar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Manage Users Section -->
        <section class="content-area flex-grow-1" style="margin-left: 260px; padding: 20px;">
            <section class="container my-5 px-4" style="width: 80rem;">
                <div class="d-flex flex-column text-primary flex-md-row justify-content-between align-items-center mb-4">
                    <h1 class="fw-bold text-uppercase mb-3 mb-md-0">
                        <i class="fa-solid fa-users me-2"></i> Manage Users
                    </h1>
                    <div class="border-top border-2 border-dark opacity-75 d-md-none w-100 mb-3"></div>
                </div>
                <div class="table-responsive shadow rounded border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>User ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            require 'includes/dbconnection.php';
                            $sql_query = "SELECT * FROM users";
                            $result = mysqli_query($con, $sql_query);

                            if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $user_id = $rows['user_id'];
                                    $fullname = $rows['fullname'];
                                    $email = $rows['email'];
                                    $username = $rows['username'];
                                    $user_password = $rows['user_password'];
                                    $created_at = $rows['created_at'];
                            ?>
                                    <tr>
                                        <td class="fw-semibold"><?= $user_id ?></td>
                                        <td><?= htmlspecialchars($fullname) ?></td>
                                        <td><?= htmlspecialchars($email) ?></td>
                                        <td><?= htmlspecialchars($username) ?></td>
                                        <td class="fw-semibold text-danger">
                                            <?= htmlspecialchars($user_password) ?>
                                        </td>
                                        <td><?= date('d M Y, h:i A', strtotime($created_at)) ?></td>
                                        <td>
                                            <a href="controllers/delete-users.php?user_id=<?= $user_id ?>"
                                                class="text-danger text-decoration-none fw-semibold"
                                                onclick="return confirm('Are you sure you want to delete this user?');"
                                                data-bs-toggle="tooltip"
                                                title="Delete User">
                                                <i class="fa-solid fa-trash me-1"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center text-muted py-4'>No users found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </main>

</body>

</html>