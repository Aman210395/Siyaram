<?php
include("config.php");

if(! isset($_SESSION["is_user_logged_in"]))
{
    header("location:login.php");
}

// $a = $_SESSION['id'];
// echo $_SESSION['prof_pic']; die;
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
<form action="update_prof_pic.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 offset-md-3">
           <h4 class="text-center mt-5">Profile Pic</h4>
        <div>
            <br>
            <br>
            <?php 
            if($_SESSION['profile_pic']=="")
            {
                  $name = "avatar.png";
            }
            else{
                  $name = $_SESSION['profile_pic'];
            }
            ?>
            <img src="uploads/<?= $name ?>" height=100 width=100 alt="user profile pic">
        </div>
           <br />
           <br />
           <div class="form-group">
             <label for="">Select File</label>
           <input type="file" name="file" class="form-control">
           <p class="text-center text-danger">
               <?php
               if(isset($_SESSION['msg']))
               {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
               }
                  
              ?>
                </p>
           </div>
           <br>
           <input type="submit" name="change" class="btn btn-info" value="Submit">
       </div>
    </div>
      </form>
   </div>
    </body>
</html>









        