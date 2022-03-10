<html>
    <Head>
        <title><?= $title ?></title>
        <link type="Text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>" />
        <script src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    </Head>
    <body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Admin Panel</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('adminpanel') ?>">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('adminpanel/users') ?>">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('adminpanel/logout') ?>">Logout</a>
      </li>
    </ul>
  </div>
</nav>

    <?php $this->load->view($pagename) ?>
        
    </body>
</html>