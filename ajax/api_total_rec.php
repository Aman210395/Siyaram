<?php
$con = mysqli_connect("localhost", "root", "", "tss5");

$que = "SELECT COUNT(*) AS total FROM cities";
$result = mysqli_query($con, $que);

$data = mysqli_fetch_assoc($result);
echo json_encode($data);


?>