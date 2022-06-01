<?php
// print_r($_POST);
include("../config/db.php");
$a = $_POST['category_name'];

echo $que = "INSERT INTO category (name) VALUES ('$a')";  

 mysqli_query($con, $que);
 header("location:dashboard.php");
?>