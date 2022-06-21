<?php
include("config.php");

if(! isset($_SESSION["is_admin_logged_in"]))
{
    header("location:login.php");
}

$id = $_GET['id'];
// echo $id;
// die;

$que = "DELETE FROM user WHERE id = '$id'";

mysqli_query($con,$que);
header("location:adminhome.php");


?>