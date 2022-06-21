<?php
include("config.php");
// print_r($_POST);
// die;

$que = "UPDATE user SET username='$_POST[name]', email='$_POST[email]', password='$_POST[password]', phone='$_POST[phone]', usertype='$_POST[role]', status='$_POST[status]' WHERE id = '$_POST[abc]'";

// echo $que;die;


mysqli_query($con,$que);
header("location:adminhome.php");

?>