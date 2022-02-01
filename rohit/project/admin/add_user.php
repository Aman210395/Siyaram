<?php
include("../config/db.php");

if (!isset($_SESSION['is_admin_logged_in'])) {
    header("location:../index.php");
}


include("includes/header.php");
include("includes/navbar.php");

$que = "SELECT * FROM category";

$result = mysqli_query($con, $que);

// $data = mysqli_fetch_assoc($result);

?>

<html>

<head>

</head>

<body>
    <div class="container mt-4" style="min-height: 500px;">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="save_product.php" method="post">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add New Product</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" name="product_price" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Product Category</label>
                                <select name="product_category" class="form-control">
                                    <option>Select</option>
                                    <?php

                                    while($data= mysqli_fetch_assoc($result))
                                    {
                                        echo "<option>".$data['name']."</option>";
                                    }

                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Detail</label>
                                <textarea type="text" name="product_detail" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" name="discount" class="form-control" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Add" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>