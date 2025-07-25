<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <!-- Login Page -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg p-4">
                    <form action="#" method="post" class="p-2">
                        <h1 class="text-center fw-bold">Login to Your <br> Account</h1>
                        <hr class="mb-4">
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username...." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password...." required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <div>
                                <a href="#" class="forgot-password-link text-danger">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn w-100 login-btn">Login</button>
                        </div>
                        <div>
                            <div class="d-flex align-items-center justify-content-between">
                                <hr class="flex-grow-1 me-2 divider-line">
                                <p class="text-center m-0 fw-bold or-text">OR</p>
                                <hr class="flex-grow-1 ms-2 divider-line">
                            </div>
                            <div class="login-social-links mb-3 mb-md-0">
                                <a href="https://www.facebook.com/" class="login-social-icon mx-2 mt-3"><i
                                        class="fa-brands fa-lg fa-facebook"></i></a>
                                <a href="https://twitter.com/" class="login-social-icon mx-2 mt-3"><i
                                        class="fa-brands fa-lg fa-twitter"></i></a>
                                <a href="https://www.instagram.com/" class="login-social-icon mx-2 mt-3"><i
                                        class="fa-brands fa-lg fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/" class="login-social-icon mx-2 mt-3"><i
                                        class="fa-brands fa-lg fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="mb-3 mt-3">
                            <p class="text-center">Don't have an account? <a href="register.php" class="fw-bold register-link">Sign-Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>