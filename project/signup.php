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
                        <small class="text-danger" id="fullname_msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Email/Username</label>
                        <input type="text" name="email" class="form-control" />
                        <small class="text-danger" id="email_msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="pass" class="form-control" />
                        <small class="text-danger" id="pass_msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Re-Password</label>
                        <input type="password" name="re_pass" class="form-control" />
                        <small class="text-danger" id="re_pass_msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <Br />
                        Male : <input type="radio" value="male" id="male"  name="gender"/>
                        Female : <input type="radio" value="female" id="female" name="gender"/>
                        <br />
                        <small class="text-danger" id="gender_msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="add"></textarea>
                        <small class="text-danger" id="add_msg"></small>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <Br />
                        <Br />
                        <select  class="form-control" name="city">
                            <option value="">Select</option>
                            <option value="indore">Indore</option>
                            <option value="mumbai">Mumbai</option>
                            <option value="pune">Pune</option>
                        </select>
                        <small class="text-danger" id="city_msg"></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Contact</label>
                        <div class="input-group">
                            <Div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </Div>
                            <input type="text" name="contact" class="form-control" />
                        </div>
                        <small class="text-danger" id="contact_msg"></small>
                    </div>
                </div>
                <div class="card-footer">
                    <input id="signup_submit" type="submit" value="Signup" class="btn btn-primary" />
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
<?php
include("includes/footer.php");
?>
<script src="js/signup_val.js"></script>