<?php
include("config/db.php");





// print_r($_POST);
$a=$_POST['firstname'];
$b=$_POST['lastname'];
$c=$_POST['email'];
$d=$_POST['password'];
$x=sha1($d);
$e=$_POST['contact'];
$f=$_POST['address'];
$g=$_POST['gender'];
$h=$_POST['city'];



$abc="INSERT INTO signup(firstname,lastname,email,password,contact,address,gender,city) VALUES ('$a','$b','$c','$x','$e','$f','$g','$h')";

mysqli_query($con, $abc);
header("location:login.php");

?>