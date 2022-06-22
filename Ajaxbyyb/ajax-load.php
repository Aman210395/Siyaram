<?php
$con = mysqli_connect("localhost","root","","ajaxbyyb") or die("Connection Failed");
$sql = "SELECT * FROM students";
$result = mysqli_query($con,$sql) or die("SQL Query Failed.");
?>

<tr>
    <th>ID</th>
    <th>Name</th>
</tr>


<?php
while($data = mysqli_fetch_assoc($result))

{ ?>
        <tr>
            
            <td><?php echo $data['id']?></td>
            <td><?php echo $data['first_name']." ".$data['last_name']?></td>
            
        </tr>
<?php }
?>