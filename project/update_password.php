<?php
include("config/db.php");
// print_r($_POST);
extract($_POST);
$que = "SELECT password FROM user WHERE id = ".$_SESSION['id'];
$data = mysqli_fetch_assoc(mysqli_query($con, $que));
if($data['password'] == sha1($cur_pass))
{
    if($new_pass == $confirm_new_pass)
    {
        $x = sha1($new_pass);
        mysqli_query($con, "UPDATE user SET password = '$x' WHERE id = ". $_SESSION['id']);
        $_SESSION['success_msg']="Password Change Successfuly";
        header("location:profile.php");
    }
    else{
        $_SESSION['msg']="New Password and Confirm New Password not Correct !";
        header("location:change_password.php");
    }
}
else{
    $_SESSION['msg']="Current Password not Matched !";
    header("location:change_password.php");
}
?>