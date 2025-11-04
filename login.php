<!-- Login Process -->
<?php require 'controllers/login-process.php'; ?>

<!-- HTML Code For the Structure -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <!-- Login Page -->
    <div class="container my-5 py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold">Login to Your Account</h2>
                            <p class="text-muted small">Access your CineBook profile or manage your bookings.</p>
                        </div>
                        <hr>
                        <form action="#" method="POST" novalidate>
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username....">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password....">
                                    <button class="btn" type="button" id="togglePassword">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label small" for="remember">Remember Me</label>
                                </div>
                                <a href="#" class="text-decoration-none text-danger small fw-semibold">Forgot Password?</a>
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" id="login_btn" class="btn fw-semibold">
                                    <i class="fa-solid fa-right-to-bracket me-2"></i>Login
                                </button>
                            </div>
                            <div class="d-flex align-items-center my-3">
                                <hr class="flex-grow-1">
                                <span class="mx-2 text-muted">OR</span>
                                <hr class="flex-grow-1">
                            </div>
                            <div class="d-flex justify-content-center gap-3 mb-4">
                                <a href="https://www.facebook.com/" class="text-primary"><i class="fa-brands fa-facebook fa-xl"></i></a>
                                <a href="https://twitter.com/" class="text-info"><i class="fa-brands fa-twitter fa-xl"></i></a>
                                <a href="https://www.instagram.com/" class="text-danger"><i class="fa-brands fa-instagram fa-xl"></i></a>
                                <a href="https://www.linkedin.com/" class="text-primary"><i class="fa-brands fa-linkedin fa-xl"></i></a>
                            </div>
                            <p class="text-center fw-semibold mb-2">Don’t have an account?</p>
                            <div class="d-grid">
                                <a href="register.php" class="btn fw-semibold">
                                    <i class="fa-solid fa-user-plus me-2"></i>Register
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>

</body>

</html>