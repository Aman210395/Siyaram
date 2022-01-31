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
    <div class="row">
        <div class="col-md-6 offset-md-3">
          <h3 class="text-center bg-success">User Profile</h3>



        </div>
   </div>
</div>

<?php
include("includes/footer.php");
?>