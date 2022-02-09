<?php
include("../config/db.php");

$que = "UPDATE user SET status = !status WHERE id = ".$_GET['id'];
mysqli_query($con, $que);
header("location:view_user.php");

/*
$que = "SELECT * FROM user WHERE id = ".$_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($con, $que));

if($data['status']==1)
{
    $que = "UPDATE user SET status= 0 WHERE id = ".$_GET['id'];
}
else{
    $que = "UPDATE user SET status= 1 WHERE id = ".$_GET['id'];
}
mysqli_query($con, $que);
header("location:view_user.php");
*/




?>