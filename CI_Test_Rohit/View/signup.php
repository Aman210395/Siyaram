<script>
    $(document).ready(function() {
      $("#submit").submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        // var a = $("#name").val();
        // var b = $("#age").val();
        // var c = $("#city").val();
        var url = '<?php echo site_url('Home/save') ?>';
        if ($('#image').val() == '') {
          alert("Please Select the File");
        } else {

          $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function() {
              alert("Data Added");
            },
            error: function() {
              alert("Data Not Added");
            }
          });

        }

      });
    });
  </script>
 
 
 
 
 
 <title><?=$title?></title>
 
 <div class="container mt-3" style="min-height:700px;">
 <form id="submit" data-parsley-validate="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
               <div class="card-header">
                   <h3 class="text-center">User's Signup</h3>
               </div>
               <div class="card-body">
                   <div class="form-group">
                       <label>Fullname</label>
                       <input type="fullname" name="fullname" required="" class="form-control" >
                       <!-- <small class="text-center text-danger" id="name_msg"></small> -->
                    </div>
                    <div class="form-group">
                       <label>Email</label>
                       <input type="email" name="email" required="" class="form-control">
                       <!-- <small class="text-center text-danger" id="email_msg"></small> -->
                  </div>
                   <div class="form-group">
                       <label>Password</label>
                       <input type="password" name="password" required="" class="form-control">
                       <!-- <small class="text-center text-danger" id="pass_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Re-password</label>
                        <input type="password" name="re_pass" required="" class="form-control">
                       <!-- <small class="text-center text-danger" id="re_password_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input type="contact" name="contact" required="" class="form-control">
                       <!-- <small class="text-center text-danger" id="contact_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Select Gender :</label>
                        Male: <input type="radio" value="male" required=""  name="gender">
                        Female: <input type="radio" value="female" required="" name="gender">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required="" name="address"></textarea>
                       <!-- <small class="text-center text-danger" id="address_msg"></small> -->
                    </div>
                    <div class="form-group">
                        <label>Select city</label>
                        <select class="form-control" required="" name="city">
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
                        Cricket:  <input type="checkbox" value="Cricket" required="" name="hobby[]">
                        Football: <input type="checkbox" value="Football" required="" name="hobby[]">
                        Music:    <input type="checkbox" value="Music" required=""  name="hobby[]">
                    </div>
                      <div class="form-group">
                        <label>Select Pic</label>
                        <br>
                       <input type="file" id="image" class="form-control" name="userfile">
                       <small class="text-danger text-center">
                       <?php echo
                       $this->session->flashdata("Msg");
                       ?>
                       </small>
                    </div> 
                    <input type="submit" class="btn btn-primary" value="Signup">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>  
<!-- <script src="=base_url('assets/js/signup_val.js')?>"></script> -->