<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineBook - Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Login Page -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg p-4">
                    <form action="#" method="post" class="p-2">
                        <h1 class="text-center fw-bold mb-4" style="color: #0c1424; border-bottom: 2px solid #0c1424;">
                            Login to Your <br> Account
                        </h1>
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">Username:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter Your Username...." required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Your Password...." required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <div>
                                <a href="#" style="color: #0c1424;">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn w-100" style="background-color: #0c1424; color: #f8f6fa;">Login</button>
                        </div>
                        <div>
                            <div class="d-flex align-items-center justify-content-between">
                                <hr class="flex-grow-1 me-2" style="border: 1px solid #0c1424;">
                                <p class="text-center m-0 fw-bold" style="color: #0c1424;">OR</p>
                                <hr class="flex-grow-1 ms-2" style="border: 1px solid #0c1424;">
                            </div>
                            <div class="d-flex flex-column mt-3 gap-2">
                                <a href="#"><button type="button" class="btn w-100"
                                        style="background-color: #0c1424; color: #f8f6fa;"><i
                                            class="fa-brands fa-facebook fa-lg mx-1"></i>Facebook</button></a>
                                <a href="#"><button type="button" class="btn w-100"
                                        style="background-color: #0c1424; color: #f8f6fa;"><i
                                            class="fa-brands fa-google fa-lg mx-1"></i>Google</button></a>
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <p class="text-center" style="color: #0c1424;">Don't have an account? <a href="register.php" class="fw-bold"
                                    style="color: #0c1424;">Register Now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>