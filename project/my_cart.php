<?php

include("config/db.php");
include("includes/preloader.php");
include("includes/header.php");
// include("includes/slider.php");



?>
<div class="container" style="min-height: 600px; margin-top:50px">
<a href="clear_cart.php" class="btn btn-sm btn-danger">Clear Cart</a>
    <div class="row">
        <div class="col-md-10 offset-md-1 p-3" style="border: 1px solid #000;">
            <?php
            $cart_item = $_COOKIE['cart'];
            // 5#11#9#7
            $cart_arr = explode("#", $cart_item);
            // array(5, 11, 9, 7)

            foreach($cart_arr as $x)
            {
                $que = "SELECT * FROM product WHERE id = $x";
                $data = mysqli_fetch_assoc(mysqli_query($con, $que));
                ?>
                    <div class="row mt-2" style="border-bottom: 1px solid #ccc;">
                        <div class="col-md-4">
                            <img src="admin/pro_image/<?= $data['product_image'] ?>" class="img-thumbnail" style="height: 150px; width:100%"/>
                        </div>
                        <div class="col-md-6">
                            <h4><?= $data['name'] ?></h4>
                            <p><?= $data['category'] ?></p>
                        </div>
                        <div class="col-md-2">
                            <h5 class="text-right">
                                <?= $data['price']; ?>
                            </h5>
                        </div>
                    </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
 
 include("includes/footer.php");
 ?>