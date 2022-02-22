<?php
$con = mysqli_connect("localhost", "root", "", "tss5");

extract($_POST);

$que = "INSERT INTO student (name, age, city) VALUES ('$name', $age, '$city')";
mysqli_query($con, $que);
?>