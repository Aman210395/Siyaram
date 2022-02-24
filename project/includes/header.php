<?php

// print_r($_SERVER);
$current_url = $_SERVER['PHP_SELF'];
$que = "SELECT * FROM category";
$result = mysqli_query($con, $que);

if(isset($_COOKIE['cart']))
{
    $cart_item = $_COOKIE['cart']; 
    // 9
    // 9#12#17#5
    $cart_arr = explode("#", $cart_item);
    // (9)
    // (9, 12, 17, 5)
    $total = count($cart_arr);
}
else{
    $total = 0;
}

$que_logo = "SELECT * FROM logo WHERE status = 1";
$result_logo = mysqli_query($con, $que_logo);



?>
<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <?php
                                if(isset($_SESSION['is_user_logged_in']))
                                { 
                                    
                                    if($_SESSION['profile_pic']=="")
                                    {
                                        $name = "avatar.png";
                                    }
                                    else{
                                        $name = $_SESSION['profile_pic'];
                                    }
                                    ?>
                                    
                                    <a href="#"><img src="user_img/<?= $name ?>" style="height: 40px; width:40px" /> <?= $_SESSION['name'] ?></a>
                                    <a href="profile.php">My Profile</a>
                                    <a href="logout.php">Logout</a>


                                <?php 
                                }
                                else
                                { ?>

                                        <a href="signup.php">Signup</a>
                                        <a href="login2.php">Login</a>


                                <?php 
                                }
                                ?>
                                
                               
                                
                            </div>
                            <div class="header__top__hover">
                                <a href="my_cart.php">My Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i>(<?= $total ?>)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <?php
                        if(mysqli_num_rows($result_logo)==1){
                            $data_logo = mysqli_fetch_assoc($result_logo);
                            ?>
                                    <a href="./index.html"><img src="admin/logos/<?= $data_logo['logo_name'] ?>" style="height:50px" /></a>
                            <?php


                        }else{ ?>

                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li <?php if(strstr($current_url, "index.php")) echo "class='active'"; ?>><a href="index.php">Home Page</a></li>
                            <li <?php if(strstr($current_url, "view_product_by_category.php")) echo "class='active'"; ?>><a href="#">Category</a>
                                <ul class="dropdown">
                                    <?php
                                        while($data=mysqli_fetch_assoc($result))
                                        {
                                            echo "<li><a href='view_product_by_category.php?category=".$data['name']."'>".$data['name']."</a></li>";
                                        }
                                    ?>
                                    <!-- <li><a href="./about.html">About Us</a></li> -->
                                    
                                </ul>
                            </li>
                            <li  <?php if(strstr($current_url, "about.php")) echo "class='active'"; ?>><a href="about.php">About</a></li>
                            <li  <?php if(strstr($current_url, "contact.php")) echo "class='active'"; ?>><a href="contact.php">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
                        
                        <a href="#"><img src="img/icon/heart.png" alt=""></a>
                        <!-- <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a> -->
                        <!-- <div class="price">$0.00</div> -->
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>