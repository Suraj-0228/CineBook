<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['fullname'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "registration";

    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
      die("Connection Failed: " . mysqli_connect_error());
    }

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check that all fields are filled
    if (!empty($fullname) && !empty($email) && !empty($username) && !empty($password) && !empty($confirm_password)) {
      if ($password === $confirm_password) {
        $sql_query = "INSERT INTO register (Full_Name, Email, User_Name, password) 
                      VALUES ('$fullname', '$email', '$username', '$password')";

        if ($con->query($sql_query) === TRUE) {
          echo "<script>alert('Registration Successful.');</script>";
        } else {
          echo "<script>alert('Registration Failed!!!');</script>";
          echo "Error: " . $con->error;
        }
      } else {
        echo "<script>alert('Passwords does not match!!');</script>";
      }
    } else {
      echo "<script>alert('Please, Fill all the Details.');</script>";
    }

    $con->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CineBook - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/style.css">
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
            <div class="mb-3">
              <label for="confirm_password" class="form-label fw-bold">Confirm Password:</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password....">
              <input type="checkbox" class="mt-3" onclick="showPassword()"> Show Password
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="terms" name="terms">
              <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
            </div>
            <div class="mb-3">
              <button type="submit" class="btn w-100">Submit</button>
            </div>
            <div class="mt-3 text-center">
              <p>Already have an account? <a href="login.php" class="fw-bold">Sign-In</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function showPassword() {
      var pwd = document.getElementById("password");
      var con_pwd = document.getElementById("confirm_password");
      if (pwd.type === "password") {
        pwd.type = "text";
        con_pwd.type = "text";
      } else {
        pwd.type = "password";
        con_pwd.type = "password";
      }
    }
  </script>

</body>

</html>