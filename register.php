<!-- Register Process -->
<?php require 'controllers/register-process.php'; ?>

<!-- HTML Code For the Structure -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineBook - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
</head>

<body>

  <!-- Registration Page -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card border-0 shadow-lg p-4 m-1">
          <h1 class="text-center fw-bold mt-2">Create Your New <br> Account</h1>
          <hr class="mb-4">
          <form action="#" method="post">
            <div class="mb-3">
              <label for="fullname" class="form-label fw-bold">Full Name:</label>
              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Your Full Name....">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label fw-bold">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email....">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label fw-bold">Username:</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Create Your Username....">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-bold">Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password....">
            </div>
            <div class="mb-0">
              <label for="confirm_password" class="form-label fw-bold">Confirm Password:</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password....">
            </div>
            <div class="mb-3">
              <input type="checkbox" class="mt-3" onclick="showPassword()">
              <label for="showpassword">Show Password</label>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="terms" name="terms">
              <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn w-100" id="register_btn">Register</button>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <hr class="flex-grow-1 me-2 divider-line">
              <p class="text-center m-0 fw-bold">Already have an account?</p>
              <hr class="flex-grow-1 ms-2 divider-line">
            </div>
            <div class="text-center mt-3">
              <a href="login.php" class="btn btn-login w-100 w-md-auto">Sign In</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/register.js"></script>

</body>

</html>