<?php
include("config.php");

if(! isset($_SESSION["is_user_logged_in"]))
{
    header("location:login.php");
}

$que_user = "SELECT * FROM user WHERE id = ".$_SESSION['id'];

$result_user = mysqli_query($con, $que_user);

$data_user =  mysqli_fetch_assoc($result_user);
?>

<html>
    <head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Navbar</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="userhome.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-info" href=""><?=$_SESSION['username']?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
    <br>    
   <div class="container">
<form action="auth.php" method="post">
      <div class="row">
        <div class="col-md-6 offset-md-3">
           <h4 class="text-center mt-5">User Profile</h4>
       <table class="table table-bordered table-hover mt-4">
                 <tr>
                    <td>Fullname</td>
                    <td><?=$data_user['username']?></td>
                 </tr>
                 <tr>
                    <td>Email</td>
                    <td><?=$data_user['email']?></td>
                 </tr>
                 <tr>
                      <td>Phone No.</td>
                      <td><?=$data_user['phone']?></td>
                 </tr>
                 <tr>
                      <td>Profile Pic</td>

                      <?php 
                  if($_SESSION['profile_pic']=="")
               {
                  $name = "avatar.png";
               }
             else
                {
                  $name = $_SESSION['profile_pic'];
                }
            ?>
            <td><img src="uploads/<?=$name?>" height=50 width=50></td>
                 </tr>
           </table>
           <br />
           
           <a href="prof_pic.php" class="btn btn-info">Edit Profile Picture</a>
       </div>
    </div>
      </form>
   </div>
    </body>
</html>









        