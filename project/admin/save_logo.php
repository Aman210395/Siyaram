<?php
include("../config/db.php");
// print_r($_FILES);
$name = $_FILES['logo']['name'];
$size = $_FILES['logo']['size'];
$tmp_name = $_FILES['logo']['tmp_name'];

$arr = explode(".", $name);
$ext = $arr[count($arr)-1];
$new_name = time().rand(1000, 10000).".".$ext;
if($ext == "png" || $ext == "jpeg" || $ext == "jpg")
{
    if($size <= (1024*1024*1))
    {
        move_uploaded_file($tmp_name, "logos/".$new_name);
        mysqli_query($con, "INSERT INTO logo (logo_name) VALUES ('$new_name')");
        header("location:logo.php");
    }
    else{
        $_SESSION['msg']="This file size is too big";
        header("location:logo.php");
    }

}else{
    $_SESSION['msg']="This file type not allowed";
    header("location:logo.php");
}


?>