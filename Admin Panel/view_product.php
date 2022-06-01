<?php
include("../config/db.php");
if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
         
} 
include("includes/header.php");
include("includes/navbar.php");

$que = "SELECT * FROM product";

$result = mysqli_query($con, $que);
// result ki chiz ko pad nhi paa rhe the isliye mysql ne 1 function diya

// $data = mysqli_fetch_assoc($result);


?>

<div class="container mt-3" style="min-height:600px">;
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4 class="text-center">View All Products</h4>
            <table class="table table-dark table-bordered table-stripped">
                <tr>
                    <th>S.No.</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
                <?php
                while($data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$data["id"]."</td>";
                    echo "<td>".$data["name"]."</td>";
                    echo "<td>".$data["price"]."</td>";
                    echo "<td><a href = 'edit_product.php?id=".$data['id']."' class = 'btn btn-primary btn-sm'/>Edit</td>";
                    echo "<td><a href = 'delete_product.php?id=".$data['id']."' class='btn btn-danger btn-sm'/>Delete</td>";
                    echo "</tr>";
                }
                ?>
             </table>
        </div>
    </div>
</div> 