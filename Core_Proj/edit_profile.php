<?php

include("config/db.php");

if(! isset($_SESSION['is_user_logged_in']))
{
    header("location:login.php");
}
$a = $_SESSION['id'];
$que = "SELECT * FROM user_tbl WHERE id = '$a'";
$result = mysqli_query($con, $que);
$data = mysqli_fetch_assoc($result);
print_r($data);

include("includes/header.php");
include("includes/navbar.php");


?>

<div class="container mt-5" style="min-height:600px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="update.php" method="post">
            <div class="card">
               <div class="card-header">
                   <h3 class="text-center">Edit Profile</h3>
               </div>
               <div class="card-body">
                   <div class="form-group">
                       <label for="">Fullname</label>
                       <input type="text" name="fullname" value="<?=$data['fullname']?>" class="form-control">
                   </div>
                   <div class="form-group">
                       <label for="">Email/Username</label>
                       <input type="text" name="email" disabled value=<?=$data['email']?> class="form-control">
                   </div>
                   <br />
                  <input type="submit" value="Update" class="btn btn-primary">
                 </div>
            </div>
            </form>
        </div>
    </div>
</div>
