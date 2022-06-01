<html>

<head>
  <style>
    .parsley-required,
    .parsley-type {
      color: red;
    }
  </style>

  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
  <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.bundle.js') ?>"></script>
  <script src="https://parsleyjs.org/dist/parsley.js"></script>

  
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="">Amazon</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('home') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('home/about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('home/contact') ?>">Contact</a>
        </li>

        <?php
        if ($this->session->userdata("is_user_logged_in")) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Profile') ?>">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""><?= $this->session->userdata['fullname'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('Profile/logout') ?>">Logout</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('home/signup') ?>">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('home/login') ?>">Login</a>
          </li>
        <?php }

        ?>

      </ul>
    </div>
  </nav>

  <?php $this->load->view($pagename) ?>

</body>

</html>