<?php

include("config/db.php");

$e = $_POST['email'];
$p = $_POST['pass'];

$que = "SELECT * FROM user WHERE email ='$e'";
$result=mysqli_query($con, $que);

if(mysqli_num_rows($result)==1)
{
    $data = mysqli_fetch_assoc($result);
    
    if($data['password']==sha1($p))
    {
        if($data['status']==1){
            //echo "yes";die;
            $_SESSION['id']=$data['id'];
            $_SESSION['name']=$data['fullname'];
            $_SESSION['is_user_logged_in']=true;
            $_SESSION['profile_pic'] = $data['profile_pic'];
            $arr = array("success"=>"true");    
            echo json_encode($arr);
        }else{
            
            $arr = array("success"=>"false", "type"=> 3);    
            echo json_encode($arr);
            
        }    
       
    }
    else{
        $arr = array("success"=>"false", "type"=> 2);    
        echo json_encode($arr);
    }
}
else{
    $arr = array("success"=>"false", "type"=> 1);    
    echo json_encode($arr);
}


?>
