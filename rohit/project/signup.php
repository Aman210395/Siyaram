<?php
include("config/db.php");
include("includes/top_header.php");
include("includes/body.php");
?>

<div class="container m-5" style="min-height:600px">
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="save.php" method="post">
        <div class="card">
            <div class="card-header">
                <h4>Registration</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" placeholder="Enter your name" name="fullname" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Email/Username</label>
                    <input type="text" placeholder="Email" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" placeholder="Contact number" name="contact" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="password" name="pass" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Re-password</label>
                    <input type="password" placeholder="password" name="re-pass" class="form-control"/>
                </div>
                <div class="form-group">
                        <label>Gender : Male</label>
                        <input type="radio" value="male" name="gender" />
                        <label>Female</label>
                        <input type="radio" value="female" name="gender" />
                        <label>Other</label>
                        <input type="radio" value="other" name="gender" />
                    </div>
                    <div class="form-group">
                    <label>City</label>
                    <select class="form-control" name="city">
                        <option>Select</option>
                        <option>Indore</option>
                        <option>Mumbai</option>
                        <option>Delhi</option>
                        <option>Bhopal</option>
                    </select>
                    </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="add"></textarea>
                </div>
            </div>
            <div class="card-footer">
            <p style="font-size: 12px;">By clicking Sign Up, you agree to our Terms, Data Policy and Cookie
                        Policy. You may receive SMS notifications from us and can opt out at any time.</p>
                    <input type="submit" class="btn btn-primary btn-block" value="Sign up" />
            </div>
        </div>
</form>       
    </div>
</div>
</div>

<?php 
   include("includes/footer.php");
?>