<?php
include("../config/db.php");
// print_r($_GET);
$a = $_GET['id'];

 $que = "SELECT * FROM category WHERE id = $a";

$data = mysqli_fetch_assoc(mysqli_query($con, $que));

$x = $data['name'];

$que = "DELETE FROM category WHERE id = $a";
mysqli_query($con, $que);

$que = "DELETE FROM product WHERE category = '$x'";
mysqli_query($con, $que);




header("location:view_category.php");

?>