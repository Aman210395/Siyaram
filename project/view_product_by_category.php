<?php

include("config/db.php");
include("includes/preloader.php");
include("includes/header.php");

$a = $_GET['category'];

$que = "SELECT * FROM product WHERE category ='$a'";
$result = mysqli_query($con, $que);

?>
   
    <section class="product spad mt-5" style="min-height: 600px;">
        <div class="container">
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
                        <div class="product__item__text">
                            <a href="#" class="add-cart">+ Add To Cart</a>
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
//  include("includes/new_trands.php");
 include("includes/footer.php");
 ?>