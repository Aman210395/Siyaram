<?php
include("../config/db.php");

// print_r($_POST);
/*

*/
extract($_POST);

$que = "INSERT INTO product (name, price, category, detail, discount) VALUES ('$product_name', '$product_price', '$category', '$product_detail', '$discount')";

mysqli_query($con, $que);
header("location:view_product.php");

?>