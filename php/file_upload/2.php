<?php
// print_r($_POST);
// print_r($_FILES);
$a = $_FILES['image']['name'];
$b = $_FILES['image']['tmp_name'];

move_uploaded_file($b, "photos/".$a);

header("location:1.php");


?>