<?php
session_start();
session_unset();
session_destroy();

setcookie("adminname", "", time() - 3600, "/");

header("Location: admin_login.php");
exit();
?>