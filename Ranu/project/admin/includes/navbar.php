<?php
// include("../config/db.php");

?>


</body>
<nav class="navbar bg-dark navbar-expand-sm navbar-dark">
    <div class="container">
        <a href="#" class="navbar-brand">Admin panel</a>
        <button data-toggle="collapse" data-target="#menu" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class=" nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href=""></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Category</a>
                    <div class="dropdown-menu">
                        <a href="add_category.php" class="dropdown-item">Add</a>
                        <a href="view_category.php" class="dropdown-item">View</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">product</a>
                    <div class="dropdown-menu">
                        <a href="product_add.php" class="dropdown-item">Add</a>
                        <a href="product_view.php" class="dropdown-item">View</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">slider</a>
                    <div class="dropdown-menu">
                        <a href="add_slider.php" class="dropdown-item">Add</a>
                        <a href="#" class="dropdown-item">View</a>
                    </div>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link" href="user.php">user</a>
                </li>
                <li class="nav-item dropdown">
                    <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">More</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">Electronic item</div>
                        <a class="dropdown-item" href="#">tv</a>
                        <a class="dropdown-item" href="#">fridge</a>
                        <a class="dropdown-item" href="#">cooler</a>
                        <a class="dropdown-item" href="#">AC</a>
                        <a class="dropdown-item" href="#">OTG</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header">Fruits</div>
                        <a class="dropdown-item" href="#">orange</a>
                        <a class="dropdown-item" href="#">mango</a>
                        <a class="dropdown-item" href="#">kiwi</a>
                        <a class="dropdown-item" href="#">pineapple</a>
                        <a class="dropdown-item" href="#">banana</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>