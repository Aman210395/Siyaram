<?php
include("../config/db.php");
// print_r($_POST);
extract($_POST);
// print_r($_FILES);

$img_name = $_FILES['image']['name'];
$img_size = $_FILES['image']['size'];
$img_tmp_name = $_FILES['image']['tmp_name'];

$arr = explode(".", $img_name);
$ext = $arr[count($arr)-1];

$new_name = time().rand(100000, 10000000).".".$ext;

if($ext == "jpg" || $ext == "png" || $ext=="jpeg")
{
    if($img_size <= (1*1024*1024))
    {
        move_uploaded_file($img_tmp_name, "../slider_img/".$new_name);
        mysqli_query($con, "INSERT INTO slider (title, text, image) VALUES ('$title', '$text', '$new_name')");
        header("location:view_slider.php");
    }else{
        $_SESSION['msg']="The File size is too large";
        header("location: add_slider.php");
    }
}else{
    $_SESSION['msg']="The File type is not allowed";
    header("location: add_slider.php");
}
?>