<?php
include("../config/db.php");
// print_r($_POST);
$u = $_POST['username'];
$p = $_POST['pass'];

$que = "SELECT * FROM admin WHERE username='$u'";
$result = mysqli_query($con, $que);

if(mysqli_num_rows($result)==1)
{
    $data = mysqli_fetch_assoc($result);
    if($data['password'] == sha1($p))
    {
        $_SESSION['is_admin_logged_in']=true;
        header("location:dashboard.php");
    }
    else{
        $_SESSION['msg']="This Password is Incorrect";
        header("location:index.php");    
    }
}
else{
    $_SESSION['msg']="This Username and Password is Incorrect";
    header("location:index.php");
}
?>