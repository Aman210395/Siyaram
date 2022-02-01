<?php
include("../config/db.php");

if (!isset($_SESSION['is_admin_logged_in'])) {
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
                <form action="save_slider.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h3>Add New Slider</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Slider Title</label>
                                <input type="text" name="slider_title" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Slider Text</label>
                                <textarea type="text" name="slider_text" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Slider Image</label>
                                <input type="file" name="image_name" class="form-control" />
                                <p class="text-danger text-center">
                                    <?php
                                     
                                     if(isset($_SESSION['msg']))
                                     {
                                         echo $_SESSION['msg'];
                                         unset($_SESSION['msg']);
                            
                                     }

                                    ?>

                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Add" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>