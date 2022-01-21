<?php
include("config/db.php");
// include("includes/header.php");
$que = "SELECT * FROM category";
$result = mysqli_query($con, $que);
?>

<h1>Demo Page</h1>
<Br/>
<br/>
<select>
    <option>Category</option>
    <?php
    while($data = mysqli_fetch_assoc($result))
    {
        echo "<option>".$data['name']."</option>";
    }
    ?>
</select>