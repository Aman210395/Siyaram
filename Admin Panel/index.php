<?php
include("../config/db.php");
?>
<html>
    <head>
     <link rel="stylesheet" href="css/bootstrap.css">

    </head>
    <body>
    <div class="container mt-5">
    <form action="auth.php" method="post">

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h3 class="text-center">
                    Admin Login
                </h3>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" />
                </div>
               <br />
               <br />
               <input type="submit" value="Login" class="btn btn-primary">
               <br />
               <p class="text-center text-danger">
                   <?php
                   if(isset($_SESSION['msg']))
                   {
                       echo $_SESSION['msg'];
                       unset($_SESSION['msg']);
                   }
                   ?>
               </p>
            </div>
            </form>
        </div>
    </div>
    </body>
</html>