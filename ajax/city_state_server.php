<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
$a = $_POST['state'];
$que = "SELECT * FROM cities WHERE city_state = '$a'";
$result = mysqli_query($con, $que);
$arr = array();
while($data = mysqli_fetch_assoc($result))
{
    $arr[]=$data;
}
echo json_encode($arr);
?>