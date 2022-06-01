<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
$que = "INSERT INTO studajx (name, age, city) VALUES('aman', 21, 'Mhow')";
mysqli_query($con, $que );
$que = "INSERT INTO studajx (name, age, city) VALUES('rohit', 21, 'Indore')";
mysqli_query($con, $que );
?>
