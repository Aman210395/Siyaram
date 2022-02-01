<nav class="navbar bg-dark navbar-expand-sm navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Admin Panel</a>
            <button data-toggle="collapse" data-target="#menu" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Category</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="add_category.php">Add</a>
                        <a class="dropdown-item" href="view_category.php">View</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Products</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="add_product.php">Add</a>
                        <a class="dropdown-item" href="view_product.php">View</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Orders</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Slider</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="add_slider.php">Add</a>
                        <a class="dropdown-item" href="view_slider.php">View</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">Logo</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="add_logo.php">Add</a>
                        <a class="dropdown-item" href="view_logo.php">View</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>