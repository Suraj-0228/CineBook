<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Contact-Us Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/contact.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- navbar -->
    <?php include 'includes/header.php'; ?>

    <!-- Contact Section -->
    <section class="contact-section py-5">
        <div class="container">

            <!-- Section Title -->
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-2">Get in Touch</h2>
                <p class="text-muted mb-0">
                    Have a question about bookings, payments, or showtimes?
                    Send us a message and we’ll get back to you shortly.
                </p>
            </div>

            <div class="row g-4 align-items-stretch">

                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="d-flex flex-column gap-3 h-100">

                        <div class="contact-info-card p-3 rounded-4 shadow-sm bg-white d-flex">
                            <div class="icon-circle me-3">
                                <i class="fa-solid fa-location-dot text-primary fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">Our Office</h6>
                                <p class="mb-0 small text-muted">
                                    2nd Floor, Raj Imperial,<br>
                                    Surat, Gujarat, India
                                </p>
                            </div>
                        </div>

                        <div class="contact-info-card p-3 rounded-4 shadow-sm bg-white d-flex">
                            <div class="icon-circle me-3">
                                <i class="fa-solid fa-phone text-success fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">Phone</h6>
                                <p class="mb-0 small text-muted">
                                    +91 63594 21359<br>
                                    Mon – Sat, 10:00 AM – 7:00 PM
                                </p>
                            </div>
                        </div>

                        <div class="contact-info-card p-3 rounded-4 shadow-sm bg-white d-flex">
                            <div class="icon-circle me-3">
                                <i class="fa-solid fa-envelope text-danger fa-lg"></i>
                            </div>
                            <div>
                                <h6 class="fw-semibold mb-1">Email</h6>
                                <p class="mb-0 small text-muted">
                                    cinebookmovies@gmail.com<br>
                                    We reply within 24 hours.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg contact-form-card h-100">
                        <div class="card-body p-4 p-md-5">

                            <h4 class="fw-bold mb-3">
                                Send us a message
                            </h4>
                            <p class="text-muted small mb-4">
                                Share your query with your registered email so we can quickly track your bookings.
                            </p>

                            <form action="send-message.php" method="POST" class="needs-validation" novalidate>
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Full Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name....." required>
                                        <div class="invalid-feedback">Enter your full name.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email....." required>
                                        <div class="invalid-feedback">Enter a valid email.</div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Subject</label>
                                        <input type="text" class="form-control" name="subject" placeholder="Enter Your Subject....." required>
                                        <div class="invalid-feedback">Subject is required.</div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label fw-semibold">Message</label>
                                        <textarea class="form-control" name="message" rows="5" placeholder="Enter Your Message....." required></textarea>
                                        <div class="invalid-feedback">Write your message.</div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-between align-items-center mt-3">
                                        <small class="text-muted">
                                            <i class="fa-solid fa-circle-info me-1"></i>
                                            Please avoid sharing card/UPI details in this form.
                                        </small>

                                        <button class="bg-primary px-5 py-2 text-white border border-0 rounded fw-semibold px-4 text-decoration-none rounded-pill" type="submit">
                                            <i class="fa-regular fa-paper-plane me-1"></i> Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Location / Map Section -->
            <section class="location-section mt-5">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    <div class="mt-5">
                        <h5 class="fw-semibold mb-1">
                            Find Us on the Map
                        </h5>
                        <p class="text-muted small mb-0">
                            Visit our CineBook office for partnership, support or business enquiries.
                        </p>
                    </div>
                    <a href="https://maps.app.goo.gl/" target="_blank" class="bg-primary px-5 py-2 text-white border border-0 rounded fw-semibold px-4 text-decoration-none rounded-pill">
                        <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>
                        Open in Google Maps
                    </a>
                </div>
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden map-card h-100">
                            <div class="ratio ratio-16x9">
                                <iframe
                                    class="map-iframe"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.3837982469935!2d72.831!3d21.212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04db7a84bdc93%3A0x6b0671!2sRaj%20Imperial!5e0!3m2!1sen!2sin!4v1700000000000"
                                    allowfullscreen
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card office-card border-0 shadow-sm rounded-4 h-100">
                            <div class="office-card-header p-4 rounded-top-4">
                                <h5 class="fw-bold text-white mb-0">
                                    <i class="fa-solid fa-building me-2"></i>
                                    CineBook Office
                                </h5>
                                <p class="text-white small mt-1 mb-0">
                                    Visit us for support.
                                </p>
                            </div>
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <h6 class="fw-semibold mb-1">
                                        <i class="fa-solid fa-location-dot me-2 text-danger"></i>
                                        Office Address
                                    </h6>
                                    <p class="text-muted small mb-0">
                                        2nd Floor, Raj Imperial, Surat, Gujarat, India.
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="fw-semibold mb-2">
                                        <i class="fa-solid fa-circle-info me-2 text-danger"></i>
                                        Highlights
                                    </h6>
                                    <ul class="list-unstyled small text-muted">
                                        <li class="d-flex align-items-center mb-2">
                                            <span class="highlight-icon text-primary me-2">
                                                <i class="fa-solid fa-train-subway"></i>
                                            </span>
                                            15 mins from Surat Railway Station.
                                        </li>
                                        <li class="d-flex align-items-center mb-2">
                                            <span class="highlight-icon text-primary me-2">
                                                <i class="fa-solid fa-bus"></i>
                                            </span>
                                            Easy access by local transport.
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <span class="highlight-icon text-primary me-2">
                                                <i class="fa-solid fa-square-parking"></i>
                                            </span>
                                            Nearby parking available.
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h6 class="fw-semibold mb-2">
                                        <i class="fa-solid fa-clock me-2 text-danger"></i>
                                        Office Hours
                                    </h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
                                            Mon – Sat
                                        </span>
                                        <span class="badge rounded-pill bg-light text-dark border px-3 py-2">
                                            10:00 AM – 7:00 PM
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>