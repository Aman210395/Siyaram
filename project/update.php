<?php
include("config/db.php");

// print_r($_POST);
extract($_POST);
$que = "UPDATE user SET fullname='$fullname', gender='$gender', address='$add', contact='$contact', city='$city' WHERE id = ".$_SESSION['id'];

mysqli_query($con, $que);

header("location:profile.php");

?>