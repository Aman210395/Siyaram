<?php
include("../config/db.php");
include("includes/header.php");
include("includes/navbar.php");

$que = "SELECT * FROM category";

$result = mysqli_query($con, $que);
?>
<div class="container mt-4" style="min-height: 600px;">
    <div class="row">
        <div class="col-md-8 offset-md-2 ">
            <form action="save_product.php" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header bg-success">
                    <h4>Add new product</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>product Name</label>
                        <input type="text" name="product_name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>price</label>
                        <input type="text" name="price" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>product category</label>
                        <select name="product_category" class="form-control">
                            <option>Select</option>
                         <?php 
                         while($data = mysqli_fetch_assoc($result))
                         {
                             echo "<option>".$data['name']."</option>";
                         }
                         
                         ?>


                        </select>
                    </div>
                    <div class="form-group">
                        <label>product Image</label>
                        <input type="file" name="image" class="form-control"/>
                        <p class="text-danger text-center">
                            <?php
                            
                            if(isset($_SESSION['msg']))
                            {
                                echo $_SESSION['msg'];
                                unset ($_SESSION['msg']);
                            }
                            ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <label>details</label>
                        <input type="text" name="product_details" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>discount</label>
                        <input type="text" name="discount" class="form-control"/>
                    </div>

                </div>
                <div class="card-footer bg-success">
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>