<?php
$a = $_GET['id'];
$cart_item = $_COOKIE['cart'];
$arr = explode("#", $cart_item);
print_r($arr);
$arr2 = array_diff($arr, array($a));
// print_r($arr2);
$str = implode("#", $arr2);
setcookie("cart", $str, time()+(3600*24*365));
header("location:my_cart.php");
?>