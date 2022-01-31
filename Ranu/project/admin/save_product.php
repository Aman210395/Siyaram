<?php
include("../config/db.php");
// print_r($_FILES);

// print_r($_POST);

// $a =$_POST['product_name'];
// $b =$_POST['price'];
// $c =$_POST['product_category'];
// $d =$_POST['image'];
// $e =$_POST['product_details'];
// $f =$_POST['discount'];

extract($_FILES);


$image_name = $_FILES['image']['name'];
$image_size = $_FILES['image']['size'];
$image_tmp_name = $_FILES['image']['tmp_name'];

$data=explode(".",$image_name);
$n = count($data);
$ext = $data[$n-1];
echo $ext;

if($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "gif" || $ext =="bmp")
{

    move_uploaded_file($image_tmp_name,"pro_image/".$image_name);


    echo $que = "INSERT INTO product (product_name,price,product_category,details,discount,product_image) VALUES ('$product_name','$price''$product_category',$image','$product_details','$discount')";
    
    mysqli_query($con, $que);
    
    header("location:deshboard.php");
    



}else {
    $_SESSION['msg']="This File Type is not Allowed";
    header("location:product_add.php");
}








?>