<?php
include("../config/db.php");
include("includes/header.php");
include("includes/navbar.php");

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="save_slider.php" method="post">
                
             <div class="card">
                 <div class="card-header bg-success">
                 <h3>Add Slider</h3>
                 </div>
                 <div class="card-body ">
                     <div class="form-group">
                         <label>slider Title</label>
                         <input type="text" name="slider_titel" class="form-control"/>
                     </div>
                     <div class="form-group">
                         <label>slider Text</label>
                         <input type="textarea" name="slider_text" class="form-control"/>
                     </div>
                     <div class="form-group">
                         <label>slider Image</label>
                         <input type="file" name="slider_image" class="form-control"/>
                     </div>
                     
                     
                 </div>
                 <div class="card-footer bg-success"></div>
                 <input type="submit"value="Add" class="btn btn-success"/>
             </div>
            </form>
        </div>
    </div>
</div>