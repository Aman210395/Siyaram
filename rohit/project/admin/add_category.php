<?php
include("../config/db.php");

if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
}

include("includes/header.php");
include("includes/navbar.php");
?>

<html>
    <head>

    </head>
    <body>
        <div class="container mt-4" style="min-height: 500px;">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="save_category.php" method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Add New Category</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name= "category_name" class="form-control" />
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
    </body>
</html>