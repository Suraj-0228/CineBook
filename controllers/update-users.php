<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['fullname1'])) {

        require '../includes/dbconnection.php';

        $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
        $fullname = mysqli_real_escape_string($con, $_POST['fullname1']);
        $email = mysqli_real_escape_string($con, $_POST['email1']);
        $username = mysqli_real_escape_string($con, $_POST['username1']);

        $sql_query = "UPDATE users 
                      SET fullname = '$fullname', email = '$email', username = '$username' 
                      WHERE user_id = '$user_id'";
        $result = mysqli_query($con, $sql_query);

        if (mysqli_affected_rows($con)) {
            echo "<script>
                    alert('Profile Updated Successfully.');
                    window.location.href = '../profile.php?user_id=$user_id';
                </script>";
        } else {
            echo "<script>
                    alert('Profile Updating Failed!');
                    window.location.href = '../profile.php?user_id=$user_id';
                </script>";
        }
        $con->close();
    }
}
?>
