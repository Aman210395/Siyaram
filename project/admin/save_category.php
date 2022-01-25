<?php
// print_r($_POST);
include("../config/db.php");
$a = $_POST['category_name']; // name attribute

$que = "INSERT INTO category (name) VALUES ('$a')";
                        // name ---- col name

mysqli_query($con, $que);

header("location:dashboard.php");

?>