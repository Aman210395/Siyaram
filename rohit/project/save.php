<?php 
// print_r($_POST);


// $con = mysqli_connect("localhost", "root", "", "rohit");
include("config/db.php");

$a = $_POST['fullname'];
$b = $_POST['email'];
$c = $_POST['contact'];
$d = $_POST['pass'];

$x = sha1($d);
$e = $_POST['re-pass'];
$f = $_POST['gender'];
$g = $_POST['city'];
$h = $_POST['add'];

$que="INSERT INTO user(fullname, email, contact, password, gender, city, address) VALUES ('$a', '$b', '$c', '$x', '$f', '$g', '$h')";

mysqli_query($con, $que);
header("location:login.php");

?>