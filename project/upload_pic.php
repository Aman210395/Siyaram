<?php
include("config/db.php");
// print_r($_FILES);
$name = $_FILES['image']['name'];
$size = $_FILES['image']['size'];
$tmp_name = $_FILES['image']['tmp_name'];

$arr = explode(".", $name);
$ext = $arr[count($arr)-1];
$new_name = time().rand(1000, 10000).".".$ext;
if($ext == "png" || $ext == "jpeg" || $ext == "jpg")
{
    if($size <= (1024*1024*1))
    {
        $_SESSION['profile_pic']=$new_name;
        move_uploaded_file($tmp_name, "user_img/".$new_name);
        mysqli_query($con, "UPDATE user SET profile_pic = '$new_name' WHERE id = ".$_SESSION['id']);
        header("location:profile.php");
    }
    else{
        $_SESSION['msg']="This file size is too big";
        header("location:profile_pic.php");
    }

}else{
    $_SESSION['msg']="This file type not allowed";
    header("location:profile_pic.php");
}


?>