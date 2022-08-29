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

include("includes/header.php");
include("includes/navbar.php");


?>

<div class="container mt-5" style="min-height:600px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">User Profile</h4>
            <table class="table table-bordered table-hover mt-3">
               <tr>
                   <td>Fullname</td>
                   <td><?=$data['fullname']?></td>
               </tr>
               <tr>
                   <td>Email/Username</td>
                   <td><?=$data['email']?></td>
               </tr>
               <tr>
                   <td>Profile Pic</td>
                   <td><img src="prof_image/<?=$data['imgname']?>" height="100px" width="150px"/></td>
                   
               </tr>

           </table>
           <br />
           <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
           <a href="change_password.php" class="btn btn-primary">Change Password</a>
            
        </div>
    </div>
</div>