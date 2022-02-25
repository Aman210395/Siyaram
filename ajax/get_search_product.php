<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
$x = $_POST['search'];

$que = "SELECT * FROM mytable WHERE title LIKE '$x%'";
$result = mysqli_query($con, $que);
$arr = array();
while($data = mysqli_fetch_assoc($result))
{
    $arr[]=$data;
}
echo json_encode($arr);
?>