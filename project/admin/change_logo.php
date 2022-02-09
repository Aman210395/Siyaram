<?php
include("../config/db.php");

$a = $_GET['id'];
mysqli_query($con, "UPDATE logo SET status = 0");
mysqli_query($con, "UPDATE logo SET status = 1 WHERE id = $a");
header("location:logo.php");

?>