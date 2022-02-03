<?php

include("config/db.php");
include("includes/preloader.php");
include("includes/header.php");
// include("includes/slider.php");
$a = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM product WHERE id =$a"));


?>
   
    <section class="product spad mt-5" style="min-height: 600px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="m-3">Product Detail</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <img src="admin/pro_image/<?= $data['product_image'] ?>" class="img-thumbnail" width="100%" height="300" />
                </div>
                <div class="col-md-7">
                    <h2><?= $data['name'] ?></h2>
                    <br />
                    <h4><?= $data['category'] ?></h4>
                    <Br />
                    <h6><?= $data['price'];?></h6>
                    <Br />
                    <p><?= $data['detail']; ?></p>
                </div>
            </div>
            
        </div>
    </section>
        <!-- new_trands  -->
 <?php
//  include("includes/new_trands.php");
 include("includes/footer.php");
 ?>