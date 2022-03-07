<?php 
   $current_url = $this->uri->segment(2); 
?>
<!DOCTYPE html>
<html>
   <head>
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      
      
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title><?= $title ?></title>
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>" />
      <link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet" />
      <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" />
      <link href="<?= base_url('assets/css/responsive.css') ?>" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.html"><img width="250" src="<?= base_url('assets/images/logo.png') ?>" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item <?php if($current_url == "") echo "active"; ?>">
                           <a class="nav-link" href="<?= site_url('user') ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                       <!-- <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="about.html">About</a></li>
                              <li><a href="testimonial.html">Testimonial</a></li>
                           </ul>
                        </li> -->
                        
                        
                        <li class="nav-item <?php if(strstr($current_url, "contact")) echo "active"; ?>">
                           <a class="nav-link" href="<?= site_url('user/contact') ?>">Contact</a>
                        </li>
                        <li class="nav-item <?php if(strstr($current_url, "about")) echo "active"; ?>">
                           <a class="nav-link" href="<?= site_url('user/about') ?>">About</a>
                        </li>
                        <?php
                        if($this->session->userdata("is_user_logged_in"))
                        { ?>
                           <li class="nav-item <?php if(strstr($current_url, "signup")) echo "active"; ?>">
                           <a class="nav-link" href="<?= site_url('profile') ?>">Profile</a>
                        </li>
                        <li class="nav-item <?php if(strstr($current_url, "login")) echo "active"; ?>">
                           <a class="nav-link" href="<?= site_url('profile/logout') ?>">Logout</a>
                        </li>
                        <?php }
                        else{ ?>
                           <li class="nav-item <?php if(strstr($current_url, "signup")) echo "active"; ?>">
                           <a class="nav-link" href="<?= site_url('user/signup') ?>">Signup</a>
                        </li>
                        <li class="nav-item <?php if(strstr($current_url, "login")) echo "active"; ?>">
                           <a class="nav-link" href="<?= site_url('user/login') ?>">Login</a>
                        </li>
                        <?php }
                        ?>
                        
                        
                        
                     </ul>
                  </div>
               </nav>
            </div>
         </header>

        <?php $this->load->view($pagename); ?>




         <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="<?= base_url('assets/images/logo.png')?>" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> 28 White tower, Street Name New York City, USA</p>
                        <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                        <p><strong>EMAIL:</strong> yourmain@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">About</a></li>
                           <li><a href="#">Services</a></li>
                           <li><a href="#">Testimonial</a></li>
                           <li><a href="#">Blog</a></li>
                           <li><a href="#">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Register</a></li>
                           <li><a href="#">Shopping</a></li>
                           <li><a href="#">Widget</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Newsletter</h3>
                        <div class="information_f">
                          <p>Subscribe by our newsletter and get update protidin.</p>
                        </div>
                        <div class="form_sub">
                           <form>
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" />
                                    <input type="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      
      
      <script src="<?= base_url('assets/js/jquery-3.4.1.min.js')?>"></script>
      
      <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
      
      <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
      
      <script src="<?= base_url('assets/js/custom.js') ?>"></script>
   </body>
</html>