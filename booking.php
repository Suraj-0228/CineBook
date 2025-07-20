<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Ticket Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar1.php'; ?>

    <!-- Booking Section -->
    <section class="booking-section">
        <div class="container">
            <div class="book-heading my-3">
                <h1 class="fw-bold fs-1">Movie: Jawan - (Hindi)</h1>
                <p class="booking-genre fs-5">Action</p>
            </div>
        </div>
        <hr class="my-4">
    </section>

    <!-- Booking Details -->
    <section class="booking-details">
        <div class="container">
            <div class="row gy-3 justify-content-between">
                <!-- Left Side: Booking Dates -->
                 <h5 class="fw-bold">Date & Price:</h5>
                <div class="col-12 col-lg-8 d-flex flex-wrap gap-2">
                    <p class="p-2 text-center border rounded border-dark">Sun 20, July</p>
                    <p class="p-2 text-center border rounded border-dark">Mon 21, July</p>
                    <p class="p-2 text-center border rounded border-dark">Tue 22, July</p>
                    <p class="p-2 text-center border rounded border-dark">Wed 23, July</p>
                    <p class="p-2 text-center border rounded border-dark">Fri 24, July</p>
                </div>

                <!-- Right Side: Language and Time -->
                <div class="col-12 col-lg-4 d-flex flex-wrap gap-2 justify-content-lg-end">
                    <p class="p-2 border rounded border-dark">Hindi - 2D</p>
                    <div class="dropdown">
                        <button class="btn p-2 fw-bold border rounded border-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Price Range
                        </button>
                        <ul class="dropdown-menu">
                            <li class="mx-3 d-flex align-items-center">
                                <input type="checkbox" class="me-2" name="time" id="time1"> 0-100₹
                            </li>
                            <li class="mx-3 d-flex align-items-center">
                                <input type="checkbox" class="me-2" name="time" id="time2"> 100-200₹
                            </li>
                            <li class="mx-3 d-flex align-items-center">
                                <input type="checkbox" class="me-2" name="time" id="time3"> 200-300₹
                            </li>
                            <li class="mx-3 d-flex align-items-center">
                                <input type="checkbox" class="me-2" name="time" id="time4"> 300-400₹
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-3">
        </div>
    </section>

    <!-- Theater Section -->
    <section class="py-4">
        <div class="container">
            <div class="mb-4">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="fw-bold mb-0">Rajhans Cinemas: Rajhans Precia, Surat</h5>
                        </a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="d-flex flex-wrap gap-2">
                            <p class="p-2 border rounded border-dark">10:00 AM</p>
                            <p class="p-2 border rounded border-dark">12:10 PM</p>
                            <p class="p-2 border rounded border-dark">2:30 PM</p>
                            <p class="p-2 border rounded border-dark">4:55 PM</p>
                            <p class="p-2 border rounded border-dark">8:00 PM</p>
                            <p class="p-2 border rounded border-dark">10:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-4">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="fw-bold mb-0">INOX: VR Mall, Surat</h5>
                        </a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="d-flex flex-wrap gap-2">
                            <p class="p-2 border rounded border-dark">10:00 AM</p>
                            <p class="p-2 border rounded border-dark">4:55 PM</p>
                            <p class="p-2 border rounded border-dark">10:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-4">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="fw-bold mb-0">Cinepolis: Imperial Square Mall, Surat</h5>
                        </a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="d-flex flex-wrap gap-2">
                            <p class="p-2 border rounded border-dark">12:10 PM</p>
                            <p class="p-2 border rounded border-dark">4:55 PM</p>
                            <p class="p-2 border rounded border-dark">8:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-4">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="fw-bold mb-0">PVR: Rahul Raj Mall, Surat</h5>
                        </a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="d-flex flex-wrap gap-2">
                            <p class="p-2 border rounded border-dark">10:00 AM</p>
                            <p class="p-2 border rounded border-dark">12:10 PM</p>
                            <p class="p-2 border rounded border-dark">2:30 PM</p>
                            <p class="p-2 border rounded border-dark">10:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="mb-4">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-4 mb-2 mb-lg-0">
                        <a href="#" class="text-decoration-none text-dark">
                            <h5 class="fw-bold mb-0">Cinezza Multiplex: Jahangirpura, Surat</h5>
                        </a>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="d-flex flex-wrap gap-2">
                            <p class="p-2 border rounded border-dark">10:00 AM</p>
                            <p class="p-2 border rounded border-dark">12:10 PM</p>
                            <p class="p-2 border rounded border-dark">10:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</body>

</html>