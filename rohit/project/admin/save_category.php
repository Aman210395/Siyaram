<?php 
// print_r($_POST);
// $con = mysqli_connect("localhost", "root", "", "rohit");
include("../config/db.php");

$a = $_POST["category_name"];

$que = "INSERT INTO category (name) VALUES ('$a')";

mysqli_query($con, $que);

header("location:dashboard.php");

?>