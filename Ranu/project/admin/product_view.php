<?php
include("../config/db.php");
include("includes/header.php");
include("includes/navbar.php");


// print_r($_POST);


$que = "SELECT * FROM product";


$result = mysqli_query($con, $que);


// echo mysqli_num_rows($result);

?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">List Of Product</h2>
            <table class="table bg-dark table-striped table-borderd text-light">
                <tr>
                    <th>S.No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>
                <?php
                while($data = mysqli_fetch_assoc($result))
                 {
                     echo "<tr>";
                     echo "<td>".$data['id']."</td>";
                     echo "<td>".$data['product_name']."</td>";
                     echo "<td>".$data['price']."</td>";
                     echo "</tr>";

                 }

                 ?>
            </table>
        </div>
    </div>
</div>