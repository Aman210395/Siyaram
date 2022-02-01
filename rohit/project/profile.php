<?php
include("config/db.php");

if(! isset($_SESSION['is_user_logged_in']))
{
header("location:login.php");
}


include("includes/top_header.php");
include("includes/body.php");
?>

<div class="container m-5" style="min-height:600px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
           <h2 class="text-center"> User Profile </h2>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>