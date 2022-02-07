<?php

// print_r($_GET);
$id = $_GET['id'];


if(isset($_COOKIE['cart']))
{

    $old_cart_item = $_COOKIE['cart'];

    $new_cart_item = $old_cart_item."#".$id;

    setcookie("cart", $new_cart_item, time()+(3600*24*365));
}
else{

    setcookie("cart", $id, time()+(3600*24*365));

}

// echo $_COOKIE['cart'];
header("location:index.php");
?>