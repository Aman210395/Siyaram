<?php
include("includes/header.php");
include("includes/navbar.php");
?>


<div class="container mt-5" class="style:min-height:600px;">
    <div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="save.php" method="post" enctype="multipart/form-data">
          <div class="card">
              <div class="card-header">
                  <h4 class="text-center">User Registration</h4>
              </div>
              <div class="card-body">
                  <div class="form-group">
                      <label for="">Fullname</label>
                      <input type="text" name="fullname" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="">Email/Username</label>
                      <input type="text" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="pass" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="">Profile Pic</label>
                      <input type="file" name="prof_pic" class="form-control">
                  </div>
                  <br />
                  <input type="submit" class="btn btn-primary" value="Add">
              </div>
          </div>
          </form>
     </div>
   </div>
</div>