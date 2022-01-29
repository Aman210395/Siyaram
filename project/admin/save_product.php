<?php
include("../config/db.php");
extract($_POST);

$image_name = $_FILES['image']['name']; 
$image_size = $_FILES['image']['size'];
$image_tmp_name = $_FILES['image']['tmp_name'];
/*
    1.jpg
    100.jpg
    hello.html
    10.hello.jpg.x.15.png
*/
$data = explode(".", $image_name);
$n = count($data);
$ext =  $data[$n-1];


$new_name = time().rand(10000, 100000).".".$ext;





if($ext == "jpg" || $ext == "png" || $ext =="jpeg" || $ext =="gif" || $ext=="bmp")
{
    if($image_size <= (1*1024*1024)) // 1mb
    {

        move_uploaded_file($image_tmp_name, "pro_image/".$new_name);
        $que = "INSERT INTO product (name, price, category, detail, discount, product_image) VALUES ('$product_name', '$product_price', '$category', '$product_detail', '$discount', '$new_name')";
    
        mysqli_query($con, $que);
        header("location:view_product.php");
    }
    else{
        $_SESSION['msg']="This File is too big please upload less then 1mb";
        header("location:add_product.php");
    }
}
else
{
    $_SESSION['msg']="This File Type not Allowed";
    header("location:add_product.php");
}









?>