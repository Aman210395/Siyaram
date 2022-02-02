<?php
include("config/db.php");
if(! isset($_SESSION['is_user_logged_in']))
{
    header("location:login.php");
} // backdoor protaction


include("includes/preloader.php");
include("includes/header.php");

$que_user = "SELECT * FROM user WHERE id = ".$_SESSION['id'];
$result_user = mysqli_query($con, $que_user);
$data_user = mysqli_fetch_assoc($result_user);



?>
<div class="container m-5" style="min-height:500px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="update.php" method="post">
            <div class="card">
                <div class="card-header">
                    <h4>Update Profile</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" value="<?= $data_user['fullname']; ?>" name="fullname" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Email/Username</label>
                        <input type="text" disabled value="<?= $data_user['email']; ?>" name="email" class="form-control" />
                    </div>
                    
                    <div class="form-group">
                        <label for="">Gender</label>
                        <Br />
                        Male : <input type="radio" <?php if($data_user['gender']=='male') echo "checked"; ?> value="male"  name="gender"/>
                        Female : <input type="radio" <?php if($data_user['gender']=='female') echo "checked"; ?> value="female"  name="gender"/>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="add"><?= $data_user['address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <Br />
                        <Br />
                        <select class="form-control" name="city">
                            <option>Select</option>
                            <option <?php if($data_user['city']=="Indore") echo "selected"; ?>>Indore</option>
                            <option <?php if($data_user['city']=="Mumbai") echo "selected"; ?>>Mumbai</option>
                            <option <?php if($data_user['city']=="Pune") echo "selected"; ?>>Pune</option>
                        </select>
                    </div>
                    <Br />
                    <Br />
                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" name="contact" value="<?= $data_user['contact']; ?>" class="form-control" />
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Update" class="btn btn-primary" />
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>