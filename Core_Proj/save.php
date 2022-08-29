<?php
include("config/db.php");
// print_r($_POST);
// print_r($_FILES);
// die;
// Array ( [fullname] => aman [email] => aman@gmail.com [pass] => 123 [re-pass] => 123 ) Array ( [prof_pic] => Array ( [name] => brock-lesnar-copy.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\phpC52D.tmp [error] => 0 [size] => 409993 ) )
$a = $_POST['fullname'];
$b = $_POST['email'];
$c = $_POST['pass'];
$x = sha1($c);


$img_name = $_FILES['prof_pic'] ['name'];
$img_size = $_FILES['prof_pic'] ['size'];
$img_tmp_name = $_FILES['prof_pic'] ['tmp_name'];

$data = explode(".",$img_name);
$n = count($data);
$ext = $data[$n-1];

$new_name = time().rand(1000, 10000).".".$ext;

if($ext == "jpg" || $ext == "png" || $ext == "bmp" || $ext == "gif" || $ext == "jpeg")
{
    if($img_size <= (900*1024))   
    {
        move_uploaded_file($img_tmp_name, "prof_image/".$new_name); 

        $que = "INSERT INTO user_tbl(fullname, email, password, imgname)VALUES('$a', '$b', '$x', '$new_name')";
        
        mysqli_query($con, $que);
        
        header("location: signup.php");
    }
    else{
        $_SESSION['msg'] = "This File Size is too Big please upload less than 1kb";
        header("location: signup.php");

    }
    

}
else{

    $_SESSION['msg'] = "This File type not Allowed";
    header("location: signup.php");
}


?>



















































<!-- $que = "INSERT INTO user_tbl (fullname, email, password) VALUES ('$a', '$b', '$x')";

mysqli_query($con, $que);
header("location:signup.php");


?> -->