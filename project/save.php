<?php
// print_r($_POST);


include("config/db.php");


$a = $_POST['fullname'];
$b = $_POST['email'];
$c = $_POST['pass'];
$e = $_POST['re_pass'];
$f = $_POST['contact'];
$g = $_POST['gender'];
$h = $_POST['city'];
$i = $_POST['add'];

$que="INSERT INTO user (fullname, email, password, address, city, gender, contact) VALUES ('$a', '$b', '$c', '$i', '$h', '$g', '$f')";
// die;

mysqli_query($con, $que);
header("location:login.php");

?>