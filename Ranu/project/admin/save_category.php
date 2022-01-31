<?php
include("../config/db.php");
// print_r($_POST);
$a =$_POST['category_name'];

$que = "INSERT INTO category (name) VALUES ('$a')";

mysqli_query($con, $que);

header("location:deshboard.php");
?>