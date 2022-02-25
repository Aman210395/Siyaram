<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
$que = "SELECT * FROM mytable";
$result = mysqli_query($con, $que);
$arr = array();
while($data = mysqli_fetch_assoc($result))
{
    $arr[]=$data;
}
echo json_encode($arr);
?>