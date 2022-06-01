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
<form action="save_category.php" method="post">
    <div class="row">
        <div class="col-md-4 offset-md-4">
          <div class="card">
              <div class="card-header">
                  <h4>Add New Category</h4>
              </div>
              <div class="card-body">
                  <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="category_name" class="form-control"/>
                  </div>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn btn-success" value="Add" />
              </div> 
              </form>
          </div>
        </div>
    </div>
</div>  