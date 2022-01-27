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

?>
<div class="container mt-3" style="min-height:600px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4 class="text-center">View All Product</h4>
            <table class="table table-dark table-bordered table-striped">
                <tr>
                    <th>S.No.</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                </tr>
                <?php
                while($data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$data['id']."</td>";
                    echo "<td>".$data["name"]."</td>";
                    echo "<td>".$data["price"]."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>