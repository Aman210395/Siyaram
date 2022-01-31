<?php
$result = mysqli_query($con, "SELECT * FROM slider");
?>
<section class="hero">
        <div class="hero__slider owl-carousel">

            <?php
            
            while($data=mysqli_fetch_assoc($result))
            {
            
            ?>

            <div class="hero__items set-bg" data-setbg="slider_img/<?= $data['image'] ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                
                                <h2><?= $data['title'] ?></h2>
                                <p><?= $data['text'] ?></p>
                                <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </section>