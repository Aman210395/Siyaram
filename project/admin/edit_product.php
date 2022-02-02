<?php
include("../config/db.php");
if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
}

include("includes/header.php");
include("includes/navbar.php");

$que = "SELECT * FROM category";
$result = mysqli_query($con, $que);


$a = $_GET['id'];
$que_pro = "SELECT * FROM product WHERE id = $a";
$result_pro = mysqli_query($con, $que_pro);
$data_pro = mysqli_fetch_assoc($result_pro);

// print_r($data_pro);



?>
<div class="container mt-4" style="min-height: 600px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="update_product.php?id=<?= $a ?>" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h4>Update Product</h4>
                </div>
                <!-- <input type="hidden" name="id" value="<?= $a; ?>" /> -->
                <div class="card-body">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" value="<?= $data_pro['name'] ?>" name="product_name" class="form-control"/>
                    </div>
                    
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" value="<?= $data_pro['price'] ?>" name="product_price" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Product Category</label>
                        <select class="form-control" name="category">
                            <option>Select</option>
                            <?php
                                while($data=mysqli_fetch_assoc($result))
                                {
                                    if($data_pro['category']==$data['name']){

                                        echo "<option selected>".$data['name']."</option>";
                                    }else{

                                        echo "<option>".$data['name']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Detail</label>
                        <textarea name="product_detail" class="form-control"><?= $data_pro['detail']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Discount</label>
                        <div class="input-group">
                            <input type="text" value="<?= $data_pro['discount']; ?>" name="discount" class="form-control"/>
                            <div class="input-group-prepend">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Update"/>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>