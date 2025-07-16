<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css" />
</head>

<body>

    <!-- Navbar -->
    <?php include 'navbar1.php'; ?>

    <!-- Contact form -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg p-4">
                    <h1 class="text-center fw-bold mb-4" style="color: #0c1424; border-bottom: 2px solid #0c1424;">Contact Us</h1>
                    <form action="#" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Your Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Your Name..." required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Your Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Your Email..." required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label fw-bold">Phone No:</label>
                            <input type="number" class="form-control" id="phone" name="phone"
                                placeholder="Phone No..." required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="3"
                                placeholder="Type your message here..." required></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">I have Entered the Correct Information.</label>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>