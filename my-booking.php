<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - My Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar1.php'; ?>

    <div class="container my-5">
        <div class="booking-not-found p-4 mx-3 p-md-5 d-flex flex-column justify-content-center align-items-center text-center shadow-lg rounded">
            <h1 class="fw-bold text-danger mb-4">No Bookings Found Yet...</h1>
            <a href="movies.php" class="book-btn btn btn-outline-dark px-4 py-2">Book Now</a>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>

</html>