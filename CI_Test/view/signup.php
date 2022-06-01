<title><?=$title?></title> 
 <div class="container mt-3" style="min-height:700px;">
 <form action="<?=site_url('Home/save')?>" method="post">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
               <div class="card-header">
                   <h3 class="text-center">User's Signup</h3>
               </div>
               <div class="card-body">
                   <div class="form-group">
                       <label>Fullname</label>
                       <input type="fullname" name="fullname" class="form-control"  >
                       <!-- <small class="text-center text-danger" id="name_msg"></small> -->
                    </div>
                    <div class="form-group">
                       <label>Email</label>
                       <input type="email" name="email" class="form-control" >
                       <!-- <small class="text-center text-danger" id="email_msg"></small> -->
                  </div>
                   <div class="form-group">
                       <label>Password</label>
                       <input type="password" name="password" class="form-control" >
                       <!-- <small class="text-center text-danger" id="pass_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Re-password</label>
                        <input type="password" name="re_pass" class="form-control" >
                       <!-- <small class="text-center text-danger" id="re_password_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="contact" name="contact" class="form-control" >
                       <!-- <small class="text-center text-danger" id="contact_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Select Gender :</label>
                        Male: <input type="radio" value="male"  name="gender" >
                        Female: <input type="radio" value="female" name="gender" >
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" ></textarea>
                       <!-- <small class="text-center text-danger" id="address_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Select city</label>
                        <select class="form-control" name="city" >
                            <option value="">Select</option>
                            <option value="Indore">Indore</option>
                            <option value="Dewas">Dewas</option>
                            <option value="Ujjain">Ujjain</option>
                        </select>
                       <!-- <small class="text-center text-danger" id="city_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Hobbies</label>
                        <br>
                        Cricket:  <input type="checkbox" value="Cricket"  name="hobby[]">
                        Football: <input type="checkbox" value="Football"  name="hobby[]">
                        Music:    <input type="checkbox" value="Music"   name="hobby[]">
                    </div>
                    <!-- <div class="form-group">
                        <label>Select Pic</label>
                        <br>
                       <input type="file" class="form-control" name="userfile">
                       <small class="text-danger text-center">
                       
                       </small>
                    </div> -->
                    <input type="submit" class="btn btn-primary" value="Signup">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>  
<!-- <script src="=base_url('assets/js/signup_val.js')?>"></script> -->