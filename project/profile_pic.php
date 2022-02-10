<?php
include("config/db.php");

if(! isset($_SESSION['is_user_logged_in']))
{
    header("location:login.php");
}

include("includes/preloader.php");
include("includes/header.php");
?>
<div class="container m-5" style="min-height:500px">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="upload_pic.php" method="post" enctype="multipart/form-data">
            <h4 class="text-center">Profile Picture</h4>
            <div class="form-group">
                <label>Current Profile Picture</label>
                <br />
                <?php
                if($_SESSION['profile_pic']=="")
                {
                    $name = "avatar.png";
                }
                else{
                    
                    $name = $_SESSION['profile_pic'];
                }
                ?>
                <img src="user_img/<?= $name ?>" height="100" width="100" />
            </div>    
            <div class="form-group">
                <label>Select New Profile Image</label>
                <input type="file" class="form-control" name="image" />
                <p class="text-danger">
                    <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </p>
            </div>        
            <Br />
            <Br />
            <input type="submit" value="Upload" class="btn btn-primary" />
            </form>
        </div>
    </div>

</div>
<?php
include("includes/footer.php");
?>