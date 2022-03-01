<?php
$con = mysqli_connect("localhost", "root", "", "tss5");

$rec = $_GET['rec']; // 200
$pageno = $_GET['pageno']; // 1

$skip = ($pageno-1)*$rec;

$que = "SELECT * FROM cities LIMIT $skip, $rec";
$result = mysqli_query($con, $que);
$arr = [];
while($data = mysqli_fetch_assoc($result))
{
    $arr[] = $data;
}

echo json_encode($arr);


?>