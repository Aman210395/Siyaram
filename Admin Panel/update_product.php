<?php
include("../config/db.php");
// print_r($_POST);
// Array ( [id] => 7 [product_name] => Samsung Fridge [product_price] => 22000 [category] => Electronics [product_detail] => Samsung fridge is not so bad [discount] => 5 )
extract($_POST);
// extract($_GET);
$a = $_GET['id'];

$que = "UPDATE product SET name='$product_name', price='$product_price', category='$category', detail='$product_detail', discount='$discount' WHERE id='$a'";

mysqli_query($con, $que);
header("location:view_product.php");
?>