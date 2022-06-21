<?php
include("config.php");
include("header.php");

if(isset($_SESSION['is_user_logged_in']))
{
    header("location:userhome.php");
}

if(isset($_SESSION['is_admin_logged_in']))
{
    header("location:adminhome.php");

}
?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container mt-4" style="min-height:600px;">
          <form action="auth.php" method="post">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>Login Page</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" value="Login" name="submit" class="btn btn-success btn-block">
                          
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
                </div>
            </div>
        </div>
        </form>
    </div>
    </body>
    </html>