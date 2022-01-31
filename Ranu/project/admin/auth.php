<?php 
include("../config/db.php");
// print_r($_POST);
extract($_POST);


$que="SELECT * FROM admin WHERE username ='$email'";
$result= mysqli_query($con,$que);
if(mysqli_num_rows($result)==1)
{
    $data=mysqli_fetch_assoc($result);
    if($data ['password']==sha1 ($password))
     {
     $_SESSION['is_admin_logged_in']=true;
    header("location:deshboard.php");
}else {
    $_SESSION['msg']="This password is incorrect please check";
    header("location:index.php");
}
}else{
    $_SESSION['msg']="This Username is incorrect please check";
    header("location:index.php");
}

?>