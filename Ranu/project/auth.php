<?php
include("config/db.php");
// print_r($_POST);
$a = $_POST['email'];
$b = $_POST['password'];


$que = "SELECT * FROM signup WHERE email='$a'";


$result = mysqli_query($con, $que);


// echo mysqli_num_rows($result);

if (mysqli_num_rows($result) == 1) {

    $data = mysqli_fetch_assoc($result);
    // print_r($data);
    // echo $data['city'];
    // echo $data['password'];

    if ($data['password'] == sha1($b)) {

        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['firstname'];
        $_SESSION['is_user_logged_in'] = true;

        header("location:profile.php");

    } else {
        $_SESSION['msg'] = "Password is incorrect please check";

        header("location:login.php");
    }
} else {
    $_SESSION['msg'] = "User name is incorrect please check";

    header("location:login.php");
}
