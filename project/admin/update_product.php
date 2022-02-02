<?php
include("../config/db.php");

// print_r($_POST);
// print_r($_GET);
// die;
extract($_POST);
// extract($_GET);
$a = $_GET['id'];
// die;
$que = "UPDATE product SET name='$product_name', category='$category', price='$product_price', detail='$product_detail', discount='$discount' WHERE id ='$a'";

mysqli_query($con, $que);
header("location:view_product.php");



?>