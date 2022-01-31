<?php
include("../config/db.php");
// include("includes/header.php");
// include("includes/navbar.php");

?>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="auth.php" method="post">
                    <h3 class="text-center bg-success">Admin Login</h3>
                    <div class="form-group">
                        <label>Username/Email</label>
                        <input type="text" name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <br />
                    <br />
                    <input type="submit" value="login" class="form-control bg-success text-light" />
                    </div>
                    <p class="text-center text-success">
                        <?php
                        if(isset($_SESSION['msg']))
                        {
                        echo $_SESSION['msg'];
                        unset ($_SESSION['msg']);
                        }

                        ?>
                    </p>
                    
               
            </form>
        </div>
    </div>
</body>

</html>