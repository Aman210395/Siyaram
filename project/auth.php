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
    $data = mysqli_fetch_assoc($result);
    // print_r($data);
    // die;
    // echo $data['password'];
    if($data['password']==sha1($p))
    {
        if($data['status']==1){
            //echo "yes";die;
            $_SESSION['id']=$data['id'];
            $_SESSION['name']=$data['fullname'];
            $_SESSION['is_user_logged_in']=true;
            header("location:profile.php");
        }else{
            
            $_SESSION['msg']="You are disabled now !";
            header("location:login.php");
        }    
       
    }
    else{
        $_SESSION['msg'] = "This Password is Incorrect !";
    // echo $msg;
        header("location:login.php");
    }
}
else{
    
    $_SESSION['msg'] = "This Username and Password is Incorrect !";
    // echo $msg;
    header("location:login.php");
}


?>

<!-- 427083374036 -->