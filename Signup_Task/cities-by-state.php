<?php
    // require_once "boot.php";
$con = mysqli_connect("localhost","root","","james");

    $state_id = $_POST["state_id"];
    // echo $state_id;die;
    $result = mysqli_query($con,"SELECT * FROM city where state_id = '$state_id'");
?>
<option value="">Select City</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
    <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
<?php
}
print_r($row);
?>