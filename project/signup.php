<?php
include("config/db.php");
include("includes/preloader.php");
include("includes/header.php");
?>
<div class="container m-5" style="min-height:500px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="save.php" method="post">
            <div class="card">
                <div class="card-header">
                    <h4>Registration</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="fullname" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Email/Username</label>
                        <input type="text" name="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Re-Password</label>
                        <input type="password" name="re_pass" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <Br />
                        Male : <input type="radio" value="male"  name="gender"/>
                        Female : <input type="radio" value="female"  name="gender"/>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="add"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <Br />
                        <Br />
                        <select class="form-control" name="city">
                            <option>Select</option>
                            <option>Indore</option>
                            <option>Mumbai</option>
                            <option>Pune</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" name="contact" class="form-control" />
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Signup" class="btn btn-primary" />
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>