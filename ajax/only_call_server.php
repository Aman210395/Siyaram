<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
$que = "INSERT INTO student (name, age, city) VALUES ('gaurav', 25, 'indore')";
mysqli_query($con, $que);
?>