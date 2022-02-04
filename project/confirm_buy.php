<?php

include("config/db.php");
$a = $_GET['id'];
if(! isset($_SESSION['is_user_logged_in']))
{
    $_SESSION['buy_msg']="You are not Logged In";
    $_SESSION['current_url'] = "product_detail.php?id=".$a;
    header("location:login.php");
}

include("includes/preloader.php");
include("includes/header.php");
// include("includes/slider.php");

$que = "SELECT * FROM user WHERE id = ".$_SESSION['id'];
$data = mysqli_fetch_assoc(mysqli_query($con, $que));

$a = $_GET['id'];
$que = "SELECT * FROM product WHERE id = $a";
$data_pro = mysqli_fetch_assoc(mysqli_query($con, $que));

?>
   
    <section class="product spad mt-5" style="min-height: 600px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="m-3">Successfuly Buy</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2" style="border : 5px double #000; min-height:400px;" >
                    <div class="row" style="height: 80px; border-bottom : 1px solid #000">
                        <div class="col-md-4">
                            <img src="img/logo.png" height="30" class="mt-4" />
                        </div>
                        <div class="col-md-8 text-right">
                            <p class="mt-2"><b>Date : </b> 15-Jan-2022</p>
                            <p class="mt-1"><b>Invoice Number :</b> <?= rand(1000, 10000) ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <p class="m-0"><b>Customer Name : </b><?= $_SESSION['name']; ?></p>
                            <p class="m-0"><b>Shipping Address : </b><?= $data['address']; ?></p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>GST(12%)</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><?= $data_pro['name'] ?></td>
                                    <td><?= $data_pro['price'] ?></td>
                                    <?php
                                    $gst = $data_pro['price']*12/100;
                                    $new_price = $data_pro['price']+$gst;
                                    ?>
                                    <td><?= $new_price ?>.00</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 text-left pb-3">
                        <small>1. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum, dolorum, odio ipsum perspiciatis officia quibusdam</small>
                        <Br />
                        <small>2. Lorem ipsum dolor sit, amet consectetur adipisicing elit.</small>
                        <Br />
                        <Br />
                        <a class="btn btn-sm btn-info" href="#">Download Bill</a>
                        <button class="btn btn-sm btn-info" onclick="window.print()">Print</button>
                        </div>

                    </div>

                </div>
            </div>

            
            
        </div>
    </section>
        <!-- new_trands  -->
 <?php
//  include("includes/new_trands.php");
 include("includes/footer.php");
 ?>