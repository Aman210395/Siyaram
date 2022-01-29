<?php

include("config/db.php");
include("includes/preloader.php");
include("includes/header.php");
include("includes/slider.php");

$que = "SELECT * FROM product ORDER BY id DESC";
$result=mysqli_query($con, $que);

?>
   
        <!-- preloader  -->
        <!-- header  -->
        <!-- slider  -->





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


                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="admin/pro_image/<?= $data['product_image'] ?>">
                            <span class="label">Discount <?= $data['discount'] ?>%</span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><?= $data['name'] ?> </h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            
                            <h5>&#8377; <?= $new_price ?>(<del style="font-size: 12px !important;"><?= $data['price'] ?></del>)</h5>
                            
                        </div>
                    </div>
                </div>

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