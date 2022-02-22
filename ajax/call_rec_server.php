<?php
$con = mysqli_connect("localhost", "root", "", "tss5");
$que = "SELECT * FROM user";
$result=mysqli_query($con, $que);
while($data=mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>";
    echo $data['fullname'];
    echo "</td>";
    echo "</tr>";
}
?>