<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Ticket Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'includes/header.php'; ?>

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
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Rajhans Cinemas: Rajhans Precia, Surat"
                                data-time="10:00 AM">10:00 AM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Rajhans Cinemas: Rajhans Precia, Surat"
                                data-time="12:10 PM">12:10 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Rajhans Cinemas: Rajhans Precia, Surat"
                                data-time="2:30 PM">2:30 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Rajhans Cinemas: Rajhans Precia, Surat"
                                data-time="4:55 PM">4:55 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Rajhans Cinemas: Rajhans Precia, Surat"
                                data-time="8:00 PM">8:00 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Rajhans Cinemas: Rajhans Precia, Surat"
                                data-time="10:30 PM">10:30 PM</p>
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
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="INOX: VR Mall, Surat"
                                data-time="10:00 AM">10:00 AM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="INOX: VR Mall, Surat"
                                data-time="4:55 PM">4:55 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="INOX: VR Mall, Surat"
                                data-time="10:30 PM">10:30 PM</p>
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
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Cinepolis: Imperial Square Mall, Surat"
                                data-time="12:10 PM">12:10 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Cinepolis: Imperial Square Mall, Surat"
                                data-time="4:55 PM">4:55 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Cinepolis: Imperial Square Mall, Surat"
                                data-time="8:00 PM">8:00 PM</p>
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
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="PVR: Rahul Raj Mall, Surat"
                                data-time="10:00 AM">10:00 AM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="PVR: Rahul Raj Mall, Surat"
                                data-time="12:10 PM">12:10 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="PVR: Rahul Raj Mall, Surat"
                                data-time="2:30 PM">2:30 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="PVR: Rahul Raj Mall, Surat"
                                data-time="10:30 PM">10:30 PM</p>
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
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Cinezza Multiplex: Jahangirpura, Surat"
                                data-time="10:00 AM">10:00 AM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Cinezza Multiplex: Jahangirpura, Surat"
                                data-time="12:10 PM">12:10 PM</p>
                            <p class="p-2 border rounded border-dark time-slot"
                                data-theater="Cinezza Multiplex: Jahangirpura, Surat"
                                data-time="10:30 PM">10:30 PM</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fw-bold" id="bookingModalLabel">Book Your Seat</h2>
                    <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Movie & Theater Info -->
                    <h4 class="my-2"><strong>Movie:</strong></h4> <span id="modalMovie">Jawan - (Hindi)</span>
                    <h4 class="my-2"><strong>Theater:</strong></h4> <span id="modalTheater"></span>
                    <h4 class="my-2"><strong>Time:</strong></h4> <span id="modalTime"></span>

                    <!-- Seat Selection -->
                    <div class="my-3">
                        <h5 class="form-label fw-bold">Select your Seats:</h5>
                        <div class="d-flex gap-2 flex-wrap">
                            <!-- Dummy seats -->
                            <input type="checkbox" id="seat1" name="seats"> <label for="seat1">1</label>
                            <input type="checkbox" id="seat2" name="seats"> <label for="seat2">2</label>
                            <input type="checkbox" id="seat3" name="seats"> <label for="seat3">3</label>
                            <input type="checkbox" id="seat4" name="seats"> <label for="seat4">4</label>
                            <input type="checkbox" id="seat5" name="seats"> <label for="seat5">5</label>
                            <input type="checkbox" id="seat6" name="seats"> <label for="seat6">6</label>
                            <input type="checkbox" id="seat7" name="seats"> <label for="seat7">7</label>
                            <input type="checkbox" id="seat8" name="seats"> <label for="seat8">8</label>
                            <input type="checkbox" id="seat9" name="seats"> <label for="seat9">9</label>
                            <input type="checkbox" id="seat10" name="seats"> <label for="seat10">10</label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="proceedToPayment">Proceed to Pay</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <form action="my-booking.php" method="POST" id="paymentForm">
                    <div class="modal-header">
                        <h2 class="modal-title fw-bold" id="paymentModalLabel">Payment</h2>
                        <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Hidden Booking Data -->
                        <input type="hidden" name="movie" id="inputMovie" value="Jawan - (Hindi)">
                        <input type="hidden" name="theater" id="inputTheater">
                        <input type="hidden" name="time" id="inputTime">
                        <input type="hidden" name="seats" id="inputSeats">

                        <!-- Payment Method -->
                        <div class="mb-3">
                            <label for="payment" class="form-label fw-bold">Payment Method</label>
                            <select class="form-select" id="paymentMethod" name="payment_method" required>
                                <option selected disabled>Select Payment Method</option>
                                <option value="upi">UPI</option>
                                <option value="card">Card</option>
                                <option value="netbanking">Net Banking</option>
                            </select>
                        </div>

                        <!-- Payment Fields -->
                        <div id="paymentForms" style="display: none;">
                            <div id="upiForm" class="payment-form" style="display: none;">
                                <label for="upiId" class="form-label">UPI ID</label>
                                <input type="text" class="form-control" id="upiId" name="upi_id">
                            </div>

                            <div id="cardForm" class="payment-form" style="display: none;">
                                <input type="text" class="form-control mb-2" name="card_number" placeholder="Card Number">
                                <input type="text" class="form-control mb-2" name="expiry" placeholder="MM/YY">
                                <input type="text" class="form-control" name="cvv" placeholder="CVV">
                            </div>

                            <div id="netbankingForm" class="payment-form" style="display: none;">
                                <label class="form-label">Select Bank</label>
                                <select name="bank" class="form-select">
                                    <option value="sbi">SBI</option>
                                    <option value="hdfc">HDFC</option>
                                    <option value="icici">ICICI</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timeSlots = document.querySelectorAll('.time-slot');
            const bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
            const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));

            timeSlots.forEach(slot => {
                slot.addEventListener('click', () => {
                    const theater = slot.getAttribute('data-theater');
                    const time = slot.getAttribute('data-time');

                    document.getElementById('modalTheater').textContent = theater;
                    document.getElementById('modalTime').textContent = time;
                    document.getElementById('inputTheater').value = theater;
                    document.getElementById('inputTime').value = time;

                    bookingModal.show();
                });
            });

            document.getElementById('proceedToPayment').addEventListener('click', () => {
                // Collect selected seats
                const selectedSeats = Array.from(document.querySelectorAll('input[name="seats"]:checked'))
                    .map(seat => seat.value)
                    .join(', ');

                if (selectedSeats.length === 0) {
                    alert("Please, Select At Least One Seat!!!");
                    return;
                }

                document.getElementById('inputSeats').value = selectedSeats;
                bookingModal.hide();
                paymentModal.show();
            });

            // Payment form display based on selected method
            document.getElementById('paymentMethod').addEventListener('change', function() {
                const method = this.value;
                document.getElementById('paymentForms').style.display = "block";

                document.querySelectorAll('.payment-form').forEach(form => form.style.display = 'none');

                if (method === "upi") document.getElementById('upiForm').style.display = 'block';
                else if (method === "card") document.getElementById('cardForm').style.display = 'block';
                else if (method === "netbanking") document.getElementById('netbankingForm').style.display = 'block';
            });
        });
    </script>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>