<?php
include("../config/db.php");
if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
         
} 
include("includes/header.php");
include("includes/navbar.php");

$que = "SELECT * FROM slider";

$result = mysqli_query($con, $que);
// result ki chiz ko pad nhi paa rhe the isliye mysql ne 1 function diya

// $data = mysqli_fetch_assoc($result);


?>

<div class="container mt-2" style="min-height:600px">;
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4 class="text-center">View All Slider Image</h4>
            <table class="table table-dark table-bordered table-stripped">
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Image</th>
                </tr>
                <?php
                while($data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$data["id"]."</td>";
                    echo "<td>".$data["title"]."</td>";
                    echo "<td>".$data["text"]."</td>";
                    echo "<td><img src='../slider_img/".$data['image']."'height=100px;</td>";
                    echo "</tr>";
                }
                ?>
             </table>
        </div>
    </div>
</div>