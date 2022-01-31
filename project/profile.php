<?php
include("config/db.php");

if(! isset($_SESSION['is_user_logged_in']))
{
    header("location:login.php");
}



include("includes/preloader.php");
include("includes/header.php");
?>
<div class="container m-5" style="min-height:500px">
<form action="auth.php" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">User Profile</h4>
            
        </div>
    </div>
</form>
</div>
<?php
include("includes/footer.php");
?>