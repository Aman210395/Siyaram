<?php 
include("../config/db.php");
// print_r($_GET);

$a = $_GET['id'];

$que = "DELETE FROM product WHERE id = $a";

mysqli_query($con,$que);

header("location:view_product.php");

$que_category = "DELETE FROM category WHERE id = $a";

mysqli_query($con,$que_category);

header("location:view_category.php");
?>