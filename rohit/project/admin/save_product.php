<?php

include("../config/db.php");
// print_r($_POST);
// print_r($_FILES);
extract($_POST);

$image_name = $_FILES['product_image']['name'];
$image_size = $_FILES['product_image']['size'];
$image_tmp_name = $_FILES['product_image']['tmp_name'];

// print_r($_FILES);

$data = explode(".", $image_name);
$n = count($data);
$ext = $data[$n - 1];

$new_name = time().rand(1000,100000).".".$ext;


if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif" || $ext == "bmb") {
    move_uploaded_file($image_tmp_name, "product_image/" . $new_name);
    
    if($image_size<=(2*1024*1024))
    {
        $que = "INSERT INTO product(name,price,category,detail,discount,image_name) VALUES ('$product_name','$product_price','$product_category','$product_detail','$discount','$new_name')";

        mysqli_query($con, $que);
        header("location:view_product.php");
    } else {
        $_SESSION['msg'] ="This file size is too big please upload less than 2mb";
        header("location:add_product.php");
    }
   
} else {
    $_SESSION['msg'] ="This file name is not valid";
    header("location:add_product.php");
}
