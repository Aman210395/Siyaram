<?php
include("config/db.php");
if(isset($_SESSION['is_user_logged_in']))
{
    header("location:profile.php");
}


include("includes/preloader.php");
include("includes/header.php");
?>
<div class="container m-5" style="min-height:500px">
<form action="auth.php" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">User Login</h4>
            <?php
            if(isset($_SESSION['buy_msg']))
            { ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['buy_msg'] ?>
                    <button class="close" data-dismiss="alert">X</button>
                </div>
           <?php
           unset($_SESSION['buy_msg']);
            }
            ?>
            <div class="form-group">
                <label>Username/Email</label>
                <input type="text" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" />
            </div>
            <br />
            <Br />
            <input type="submit" value="Login" class="btn btn-success" />
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
</form>
</div>
<?php
include("includes/footer.php");
?>