<?php
include("config/db.php");

if(! isset($_SESSION['is_user_logged_in']))
{
    header("location:login.php");
}

$que_user = "SELECT * FROM user WHERE id = ".$_SESSION['id'];
$result_user = mysqli_query($con, $que_user);
$data_user = mysqli_fetch_assoc($result_user);

// print_r($data_user);


include("includes/preloader.php");
include("includes/header.php");
?>
<div class="container m-5" style="min-height:500px">
<form action="update_password.php" method="post">
    
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">Change Password</h4>
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="cur_pass" class="form-control"/>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_pass" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_new_pass" class="form-control"/>
            </div>
            <Br />
            <p class="text-danger">
                <?php
                    if(isset($_SESSION['msg']))
                    {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </p>
            <Br />
            <input type="submit" class="btn btn-success" value="Update" />
        </div>
    </div>
</form>
</div>
<?php
include("includes/footer.php");
?>