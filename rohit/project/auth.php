<?php 
include("config/db.php");
// print_r($_POST);

$e = $_POST['email'];
$p = $_POST['pass'];
// echo sha1($p);die;
$que = "SELECT * FROM user WHERE email = '$e'";
    //    "SELECT * FROM user WHERE email = hello@gmail.com

$result = mysqli_query($con, $que);

// echo mysqli_num_rows($result);

// if(mysqli_num_rows($result)==1)
// {
//     echo "yes";
// } else {
//     echo "no";
// }

if(mysqli_num_rows($result)==1)
{
    $data = mysqli_fetch_assoc($result);
    // print_r($data);
    // echo $data['gender'];
    // echo $data['password'];
    if($data['password']==sha1($p))
    {
        $_SESSION['id'] = $data['id']; 
        $_SESSION['name'] = $data['fullname'];
        $_SESSION['is_user_logged_in'] = true; 
        header("location:profile.php");
    } else {
        $_SESSION['msg'] = "This password is incorrect !";
        header("location:login.php");
    }

} else {
    $_SESSION['msg'] = "This username or password is incorrect !";
    // echo $msg;
    // print_r($_SESSION);die;
    header("location:login.php");
}

?>