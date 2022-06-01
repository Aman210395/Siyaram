<?php
include("../config/db.php");
// print_r($_POST);
extract($_POST);
// Isse same name k variable create ho jate hai jis name ka apn $_POST[] mai krte hai
// print_r($_FILES);
$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$img_tmp_name = $_FILES['image']['tmp_name'];

$a = explode(".", $img_name);
$n = count($a);
$ext = $a[$n-1];
$new_name = time().rand(10000,100000).".".$ext;

if($ext == "jpg" || $ext == "png" || $ext == "bmp" || $ext == "jpeg" || $ext == "gif")
{
    if($img_size <= (1024*1024))
{
    move_uploaded_file($img_tmp_name, "../slider_img/".$new_name);
    mysqli_query($con, "INSERT INTO slider (title, text, image) VALUES('$title', '$text', '$new_name')");
    header("location:view_slider.php");

}
else{
    $_SESSION['msg'] = "The File is too big to upload";
    header("location:add_slider.php");

}
   
}
else{
    $_SESSION['msg'] = "This File type is not Allowed";
    header("location:add_slider.php");
}