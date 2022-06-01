<?php
// print_r($_POST);
include("../config/db.php");
extract($_POST);
// echo "$product_name";

$image_name = $_FILES['image'] ['name'];
$image_size = $_FILES['image'] ['size'];
$image_tmp_name = $_FILES['image'] ['tmp_name'];

// 1.jpg 
// 100.jpg
// hello.html 

// Now to bring out extension from file name:

$data = explode(".",$image_name);
$n = count($data);
$ext = $data[$n-1];

$new_name = time().rand(1000, 10000).".".$ext;

if($ext == "jpg" || $ext == "png" || $ext == "bmp" || $ext == "gif" || $ext == "jpeg")
{
    if($image_size <= (900*1024))   
    {
        move_uploaded_file($image_tmp_name, "pro_image/".$new_name); 

        $que = "INSERT INTO product ( name, price, category, detail, discount, product_image) VALUES('$product_name', '$product_price', '$category', '$product_detail', '$discount', '$new_name')";
        
        mysqli_query($con, $que);
        
        header("location: view_product.php");
    }
    else{
        $_SESSION['msg'] = "This File Size is too Big please upload less than 1kb";
        header("location: add_product.php");

    }
    

}
else{

    $_SESSION['msg'] = "This File type not Allowed";
    header("location: add_product.php");
}


?>