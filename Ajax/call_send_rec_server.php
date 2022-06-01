<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
extract($_POST);
$que = "INSERT INTO student(name, age, city) VALUES ('$name', '$age', '$city')";
mysqli_query($con, $que);

$que = "SELECT * FROM student";
$result = mysqli_query($con, $que);
while($data = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>".$data['name']."</td>";
    echo "<td>".$data['age']."</td>";
    echo "<td>".$data['city']."</td>";
    echo "</tr>";
}

 

?>