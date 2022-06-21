<?php
include("config.php");
print_r($_POST);
// die;
$x = $_POST['pass'];
unset($_POST['conf_pass']);

$que = "INSERT INTO user(username,email,password,phone,role)VALUES('$_POST[name]','$_POST[email]','$_POST[pass]','$_POST[contact]','$_POST[role]')";

mysqli_query($con,$que);
header("location:login.php");
?>