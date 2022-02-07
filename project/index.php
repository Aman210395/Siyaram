<?php

include("config/db.php");
include("includes/preloader.php");
include("includes/header.php");
include("includes/slider.php");

$que = "SELECT * FROM product ORDER BY id DESC";
$result=mysqli_query($con, $que);

?>
   
    <section class="product spad mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="m-3">New Arrival</h3>
                </div>
            </div>
            <div class="row product__filter">
                
                <?php
                while($data=mysqli_fetch_assoc($result))
                {
                    $p = $data['price'];
                    $d = $data['discount'];

                    $x = $p*$d/100;
                    $new_price = $p-$x.".00";
                ?>

                <a href="product_detail.php?id=<?= $data['id'] ?>">
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="admin/pro_image/<?= $data['product_image'] ?>">
                            <span class="label">Discount <?= $data['discount'] ?>%</span>
                            
                        </div>
                        
                        <a href="add_to_cart.php?id=<?= $data['id'] ?>">+ Add To Cart</a>
                        <div class="product__item__text">
                            <h6><?= $data['name'] ?> </h6>
                            
                            <h5 style="margin-top: 20px;">&#8377; <?= $new_price ?>(<del style="font-size: 12px !important;"><?= $data['price'] ?></del>)</h5>
                            
                        </div>
                    </div>
                </div>
                </a>
                <?php
                }
                ?>
                
                
                
                
                
                
                
            </div>
        </div>
    </section>
        <!-- new_trands  -->
 <?php
 include("includes/new_trands.php");
 include("includes/footer.php");
 ?>