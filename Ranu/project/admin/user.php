<?php
include("includes/header.php");
include("includes/navbar.php");
include("../config/db.php");

// print_r($_POST);

// $a=$_POST['firstname'];
// $b=$_POST['lastname'];
// $c=$_POST['email'];
// $e=$_POST['contact'];

$que = "SELECT * FROM signup";

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
            <h2 class="text-center">List of User</h2>
            <table class="table bg-dark table-striped table-borderd text-light">
                 <tr>
                     <th>S.No.</th>
                     <th>firstname</th>
                     <th>lastname</th>
                     <th>email</th>
                     <th>contact</th>
                 </tr>
                 <?php 
                 while($data = mysqli_fetch_assoc($result))
                 {
                     echo "<tr>";
                     echo "<td>".$data['id']."</td>";
                     echo "<td>".$data['firstname']."</td>";
                     echo "<td>".$data['lastname']."</td>";
                     echo "<td>".$data['email']."</td>";
                     echo "<td>".$data['contact']."</td>";

                     echo "</tr>";

                 }

                 ?>
            </table>
        </div>
    </div>
<!-- </div> -->