<html>
    <head>
      <title><?= $title ?></title>
        <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>" />
        <script src="<?= base_url('assets/js/jquery.js')?>" ></script>
        <script src="<?= base_url('assets/js/bootstrap.bundle.js')?>" ></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
    </head>
    <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">My Project</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('home/index') ?>">Home</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?= site_url('home/about') ?>">About</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?= site_url('home/contact') ?>">Contact</a>
      </li>
      
      <?php
      if($this->session->userdata("is_logged_in")){ ?>
      <li class="nav-item">
      <a class="nav-link" href="<?= site_url('user') ?>">Profile</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Student</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="<?= site_url('student/add') ?>">Add</a>
        <a class="dropdown-item" href="<?= site_url('student') ?>">List</a>
      </div>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?= site_url('user/logout') ?>">Logout</a>
      </li>
      <?php }else{ ?>
        <li class="nav-item">
      <a class="nav-link" href="<?= site_url('home/signup') ?>">Signup</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="<?= site_url('home/login') ?>">Login</a>
      </li>
      <?php
        }
      ?>
      
    </ul>
  </div>
</nav>

<div style="min-height:600px">

<?php $this->load->view($pagename) ?>
</div>
    <div class="container-fluid bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h4 class="text-center text-light">This is Footer</h4>
                </div>

            </div>
        </div>
    </div>



    </body>
</html>