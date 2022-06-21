<?php
include("config.php");

$e = $_POST['email'];
$p = $_POST['pass'];

$que = "SELECT * FROM user WHERE email = '$e'";

$result = mysqli_query($con, $que);


if(mysqli_num_rows($result)==1)
{
    $data = mysqli_fetch_assoc($result);

    if($data['password']==md5($p) && $data['usertype']=="Admin")
    {
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['is_admin_logged_in'] = true;
    header("location:adminhome.php");
    }
    
    elseif($data['password']==md5($p) && $data['usertype']=="User")
    {
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['is_user_logged_in'] = true;
        $_SESSION['profile_pic'] = $data['profile_pic'];
        header("location:userhome.php");

        if($data['status']==0)
      {
        $_SESSION['msg'] = "You are disabled! Contact to our Team";
        header("location:login.php");
      }
    }
   else
   {

    $_SESSION['msg'] = "This Password is Incorrect !";
    header("location:login.php");

   } 
}  
else
{
    $_SESSION['msg'] = "This Username & Password is Incorrect";
    header("location:login.php");
}

?>