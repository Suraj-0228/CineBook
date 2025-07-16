<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineBook - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- Registration Page -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card border-0 shadow-lg p-4">
          <h1 class="text-center fw-bold mb-4" style="color: #0c1424; border-bottom: 2px solid #0c1424;">Create Your New <br> Account</h1>
          <form action="#" method="post">
            <div class="mb-3">
              <label for="fullname" class="form-label fw-bold">Full Name:</label>
              <input type="text" class="form-control" id="fullname" name="fullname"
                placeholder="Enter Your Full Name...." required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label fw-bold">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email...."
                required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label fw-bold">Username:</label>
              <input type="text" class="form-control" id="username" name="username"
                placeholder="Create Your Username...." required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-bold">Password:</label>
              <input type="password" class="form-control" id="password" name="password"
                placeholder="Enter Your Password...." required>
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-label fw-bold">Confirm Password:</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                placeholder="Confirm Your Password...." required>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="terms" name="terms">
              <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">Submit</button>
            </div>
            <div class="mb-3 mt-2 text-center">
              <p style="color: #0c1424;">Already have an account? <a href="login.php" class="fw-bold" style="color: #0c1424;">Login Now</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>