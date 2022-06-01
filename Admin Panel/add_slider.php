<?php
include("../config/db.php");

if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
         
}
include("includes/header.php");
include("includes/navbar.php");
?>
<div class="container mt-4" style="min-height:600px;">
<form action="save_slider.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
              <div class="card-header">
                  <h4>Add Images for Home Slider</h4>
              </div>
              <div class="card-body">
                  <div class="form-group">
                      <label>Slider Title</label>
                      <input type="text" name="title" class="form-control"/>
                  </div>
                  <div class="form-group">
                      <label>Slider Text</label>
                      <textarea name="text" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                      <label>Slider Image</label>
                      <input type="file" name="image" class="form-control"/>
                  </div>
                  <p class="text-danger">

                     <?php 
                     if(isset($_SESSION['msg']))
                     {
                         echo ($_SESSION['msg']);
                         unset ($_SESSION['msg']);
                     }
                     
                     ?>
                  </p>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Add" />
              </div> 
              </form>
          </div>
        </div>
    </div>
</div>  