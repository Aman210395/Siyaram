
        <nav class="navbar bg-dark navbar-expand-sm navbar-dark">
            <div class="container">
                <a href="#" class="navbar-brand">Amazon</a>
                <button data-toggle="collapse" data-target="#menu" class="navbar-toggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="menu" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                        <?php
                         if(isset($_SESSION['is_user_logged_in']))
                         { ?>
                              <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                        
                         <?php
                         }
                         else
                         { ?>
                                   <li class="nav-item">
                            <a href="signup.php" class="nav-link">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                         <?php
                         }
                         ?>
                        
                        <li class="nav-item dropdown">
                            <a data-toggle="dropdown" href="#" class="nav-link dropdown-toggle">More</a>
                            <div class="dropdown-menu">
                                <div class="dropdown-header">Mobiles</div>
                                <a class="dropdown-item" href="">Galaxy</a>
                                <a class="dropdown-item" href="">Samsung</a>
                                <a class="dropdown-item" href="">OnePlus</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">TV's</div>
                                <a class="dropdown-item" href="">MI</a>
                                <a class="dropdown-item" href="">LG</a>
                                <a class="dropdown-item" href="">Samsung</a>
                              
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>