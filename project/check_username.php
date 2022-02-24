<?php
include("config/db.php");
// print_r($_REQUEST);
$e = $_REQUEST['e'];
$que = "SELECT * FROM user WHERE email='$e'";
$result = mysqli_query($con, $que);
if(mysqli_num_rows($result)==1)
{
    $arr = array("success"=>"false");
}else{
    
    $arr = array("success"=>"true");
}

echo json_encode($arr);
?>