<html>
    <head>
      <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
      <script src="<?=base_url('assets/js/jquery.js')?>"></script>
      <script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Amazon</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <?php
       if($this->session->userdata("is_user_logged_in"))
       { ?>
        <li class="nav-item">
        <a class="nav-link" href="<?=site_url('Profile')?>">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""><?=$this->session->userdata['Name']?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('Profile/logout')?>">Logout</a>
      </li>
       <?php }
       else
       { ?>
        <li class="nav-item">
        <a class="nav-link" href="<?=site_url('Home')?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('Home/signup')?>">Signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('Home/login')?>">Login</a>
      </li>
       <?php }
      ?>
      
    </ul>
  </div>
</nav>

<?php $this->load->view($pagename)?>

    </body>
</html>