<?php
include("config/db.php");
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container mt-5" style="min-height:600px";>
<form action="auth.php" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">User Login</h4>
            <div class="form-group">
                <label for="">Username/Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass" class="form-control">
            </div>
            <br />
            <input type="submit" value="Login" class="btn btn-success">
        </div>
    </div>
    <p class="text-center text-danger">
            <?php
                 if(isset($_SESSION['msg']))
                 {
                     echo ($_SESSION['msg']);
                     unset ($_SESSION['msg']);
                 }
            ?>
        </p>
    </form>
</div>
