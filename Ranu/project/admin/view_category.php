<?php
include("../config/db.php");
include("includes/header.php");
include("includes/navbar.php");


// print_r($_POST);

$que = "SELECT * FROM category";

$result = mysqli_query($con, $que);
// print_r($result);
// $data = mysqli_fetch_assoc($result);
// print_r($data);
// $data = mysqli_fetch_assoc($result);
// print_r($data);

?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">List of all categories</h2>
            <table class="table bg-dark table-striped table-borderd text-light">
                 <tr>
                     <th>S.No.</th>
                     <th>Categories Name</th>
                 </tr>
                 <?php 
                 while($data = mysqli_fetch_assoc($result))
                 {
                     echo "<tr>";
                     echo "<td>".$data['id']."</td>";
                     echo "<td>".$data['name']."</td>";
                     echo "</tr>";

                 }

                 ?>
            </table>
        </div>
    </div>
</div>