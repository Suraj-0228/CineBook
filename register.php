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
</head>

<body>

  <!-- Registration Page -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 m-2">
          <div class="text-center">            
            <h2 class="fw-bold">Create Your New Account</h2>
            <p class="text-muted small">Join CineBook and experience seamless movie ticket booking!</p>
          </div>
          <hr>
          <form action="#" method="post" novalidate>
            <div class="mb-3">
              <label for="fullname" class="form-label fw-semibold">Full Name</label>
              <input type="text" class="form-control" id="fullname" name="fullname"
                placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Email Address</label>
              <input type="email" class="form-control" id="email" name="email"
                placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label fw-semibold">Username</label>
              <input type="text" class="form-control" id="username" name="username"
                placeholder="Create a username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">Password</label>
              <input type="password" class="form-control" id="password" name="password"
                placeholder="Enter your password" required>
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-label fw-semibold">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                placeholder="Confirm your password" required>
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="showpassword" onclick="showPassword()">
              <label for="showpassword" class="form-check-label">Show Password</label>
            </div>
            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="terms" name="terms">
              <label class="form-check-label" for="terms">
                I agree to the <a href="#" class="text-decoration-none text-primary">terms and conditions</a>
              </label>
            </div>
            <div class="d-grid mb-4">
              <button type="submit" class="btn btn-primary fw-semibold" id="register_btn">
                <i class="fa-solid fa-user-plus me-2"></i>Register
              </button>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <hr class="flex-grow-1 me-2">
              <p class="text-center m-0 fw-semibold text-muted small">Already have an account?</p>
              <hr class="flex-grow-1 ms-2">
            </div>
            <div class="text-center mt-3">
              <a href="login.php" class="btn btn-outline-primary w-100 fw-semibold">
                <i class="fa-solid fa-right-to-bracket me-2"></i>Sign In
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/register.js"></script>

</body>

</html>