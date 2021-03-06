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
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Category</a>
        <div class="dropdown-menu">
            <a href="add_category.php" class="dropdown-item">Add</a>
            <a href="view_category.php" class="dropdown-item">View</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Products</a>
        <div class="dropdown-menu">
            <a href="add_product.php" class="dropdown-item">Add</a>
            <a href="view_product.php" class="dropdown-item">View</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Home Slider</a>
        <div class="dropdown-menu">
            <a href="add_slider.php" class="dropdown-item">Add</a>
            <a href="view_slider.php" class="dropdown-item">View</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view_user.php">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logo.php">Logo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>