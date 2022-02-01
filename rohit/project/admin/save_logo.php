<?php 
// print_r($_POST);
// $con = mysqli_connect("localhost", "root", "", "rohit");
include("../config/db.php");

// print_r($_FILES);
$image_name = $_FILES['logo_name']['name'];
$image_size = $_FILES['logo_name']['size'];
$image_tmp_name = $_FILES['logo_name']['tmp_name'];

move_uploaded_file($image_tmp_name, "logo_image/".$image_name);
die;

$que = "INSERT INTO logo (logo_image) VALUES ('$a')";

mysqli_query($con, $que);

header("location:add_logo.php");

?>