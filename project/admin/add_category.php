<?php
include("includes/header.php");
include("includes/navbar.php");
?>
<div class="container mt-4" style="min-height: 600px;">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="save_category.php" method="post">
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
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>