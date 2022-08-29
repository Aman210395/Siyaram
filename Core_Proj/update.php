<?php
include("config/db.php");
// print_r($_POST);
// Array ( [fullname] => aman mangal )
extract ($_POST);
$x = $_SESSION['id'];

$que = "UPDATE user_tbl SET fullname='$fullname' WHERE id='$x'";
mysqli_query($con, $que);
header("location:profile.php");
?>