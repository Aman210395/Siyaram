<?php

$first_name = $_POST['fname'];
$last_name = $_POST['lname'];

$con = mysqli_connect("localhost","root","","ajaxbyyb") or die("Connection Failed");

$sql = "INSERT INTO ajaxbyyb(first_name,last_name)VALUES('{$first_name}','{$last_name}')";

// echo $sql;die;

if(mysqli_query($con,$sql))
{
    echo 1;
}
else{
    echo 0;
}

?>