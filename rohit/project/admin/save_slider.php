<?php

include("../config/db.php");
// print_r($_POST);
// print_r($_FILES);

extract($_POST);

$image_name = $_FILES['image_name']['name'];
$image_size = $_FILES['image_name']['size'];
$image_tmp_name = $_FILES['image_name']['tmp_name'];

$data = explode(".", $image_name);
$n = count($data);
$ext = $data[$n - 1];

$new_name = time().rand(10000,100000).".".$ext;

if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif") 
{
    if($image_size <= 1*1024*1024)
    {
        move_uploaded_file($image_tmp_name, "slider_image/" . $image_name);

        $que = "INSERT INTO slider (slider_title, slider_text, slider_image) VALUES ('$slider_title', '$slider_text','$new_name')";
    
        mysqli_query($con, $que);
    
        header("location:view_slider.php");
    } else {
        $_SESSION['msg'] = "This file size is too big please upload less than 1MB";
        header("location:add_slider.php");
    }
    

} else {
    $_SESSION['msg'] = "This file name is invalid";
    header("location:add_slider.php");
}
