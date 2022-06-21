<?php
include("config.php");

if(! isset($_SESSION["is_admin_logged_in"]))
{
    header("location:login.php");
}
$a = $_GET['id'];

$que = "SELECT * FROM user WHERE id = '$a'";
$result = mysqli_query($con,$que);
$data = mysqli_fetch_assoc($result);
// print_r($data);

if($data['status']==1)
{
    $que = "UPDATE user SET status=0 WHERE id = '$a'";
}
else{
    $que = "UPDATE user SET status=1 WHERE id = '$a'";
}
mysqli_query($con,$que);
header("location:adminhome.php");
die;
?>