<?php

include("config/db.php");
// print_r($_POST);

$e = $_POST['email'];
$p = $_POST['pass'];

$que = "SELECT * FROM user WHERE email ='$e'";
// SELECT * FROM user WHERE email='hello@gmail.com'

// SELECT * FROM user WHERE age = 25

$result=mysqli_query($con, $que);

// echo mysqli_num_rows($result);

if(mysqli_num_rows($result)==1)
{
    echo "yes";
}
else{
    
    $_SESSION['msg'] = "This Username and Password is Incorrect !";
    // echo $msg;
    header("location:login.php");
}


?>