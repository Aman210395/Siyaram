<?php
include("config/db.php");
// print_r($_POST);
// Array ( [email] => aman@gmail.com [pass] => 365 )
$e = $_POST['email'];
$p = $_POST['pass'];

$que = "SELECT * FROM user_tbl WHERE email = '$e'";

$result = mysqli_query($con, $que);

// print_r($data);

if(mysqli_num_rows($result)==1)
{
    $data = mysqli_fetch_assoc($result);

    if($data['password'] == sha1($p))
    {
         $_SESSION['id'] = $data['id'];
         $_SESSION['name'] = $data['fullname'];
         $_SESSION['is_user_logged_in'] = true;
         header("location:profile.php");
    }
    else{
        $_SESSION['msg'] = "This Username & Password doesn't Exsist";
        header("location:login.php");
    }
}
else{
    $_SESSION['msg'] = "This Username doesn't Exsist";
    header("location:login.php");
}

?>