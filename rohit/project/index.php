<?php
include("config/db.php");
include("includes/top_header.php");
include("includes/body.php");

$que = "SELECT * FROM product ORDER BY id DESC";

$result = mysqli_query($con, $que);

//$data = mysqli_fetch_assoc($result);
?>
<!-- top_header -->
<!-- body -->



<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">

        <?php

        while ($data = mysqli_fetch_assoc($result)) {
            $p = $data['price'];
            $d = $data['discount'];

            $x = $p * $d / 100;
            $new_price = $p - $x . ".00";
        ?>

            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0" style="height: 350px;">
                    <!-- <span class="lable">Discount</span> -->
                        <img class="img-fluid w-100" src="admin/product_image/<?= $data['image_name'] ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3 text-left ml-2 text-success">Discount <?= $data['discount']?>%</h6>
                        <h6 class="text-truncate mb-3"><?= $data['name'] ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>&#8377 <?= $new_price ?></h6>
                            <h6 class="text-muted ml-2">(&#8377 <del><?= $data['price'] ?></del>)</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>

        <?php }

        ?>










    </div>
</div>
<?php
include("includes/vendor.php");
include("includes/footer.php");

?>
<!-- vendor -->
<!-- footer -->