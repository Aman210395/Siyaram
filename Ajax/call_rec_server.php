<?php
// $con = mysqli_connect("localhost","root","","tss5");
// $que = "SELECT * FROM student";
// $result = mysqli_query($con, $que);

// while($data=mysqli_fetch_assoc($result))
// {
//     echo "<tr>";
//     echo "<td>".$data['name']."</td>";
//     echo "<td>".$data['age']."</td>";
//     echo "<td>".$data['city']."</td>";
//     echo "</tr>";
//     //   echo json_encode($data);
    // Apn jason format mai bhi dikha skte h data ye wale page pr aur jb aisa hoga toh ye api ki tarah react krega
// }
?>

<?php
$con = mysqli_connect("localhost","root","","tss5");
$que = "SELECT * from studajx";
$result = mysqli_query($con, $que);

while($data = mysqli_fetch_assoc($result))
{ ?>

    <tr>
        <td><?=$data['name']?></td>
        <td><?=$data['age']?></td>
        <td><?=$data['city']?></td>
    </tr>
    
<?php }



?>