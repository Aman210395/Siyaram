<?php
include("config/db.php");
include("includes/top_header.php");
include("includes/body.php");
?>

<div class="container m-5" style="min-height:600px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="auth.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">User Login</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username/Email</label>
                            <input type="text" name="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Login" />
                        <p class="text-danger text-center">   
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
            </form>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>