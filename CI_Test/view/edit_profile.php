<div class="container">
    <form action="<?=site_url('Profile/update')?>" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
             <div class="card mt-3">
                 <div class="card-header">
                     <h3 class="text-center">Edit Profile</h3>
                 </div>
                 <div class="card-body">
                     <div class="form-group">
                         <label for="">Fullname</label>
                         <input type="text" name="fullname" value="<?=$data['fullname']?>" class="form-control">
                     </div>
                     <div class="form-group">
                         <label for="">Email</label>
                         <input type="text" disabled value="<?=$data['email']?>" name="email" class="form-control">
                     </div>
                     <div class="form-group">
                         <label for="">Contact</label>
                         <input type="text" value="<?=$data['contact']?>" name="contact" class="form-control">
                     </div>
                     <div class="form-group">
                         <label for="">Gender</label>
                         <br>
                         Male: <input type="radio" <?php if($data['gender']=='male') echo 'checked'?> name="gender" value="male" >
                         Female: <input type="radio" <?php if($data['gender']=='female') echo 'checked'?> name="gender" value="female" >
                     </div>
                     <div class="form-group">
                         <label for="">Address</label>
                         <input type="text" value="<?=$data['address']?>" name="Address" class="form-control">
                     </div>
                     <div class="form-group">
                         <label for="">City</label>
                         <select class="form-control" name="city">
                             <option>Select</option>
                             <option <?php if($data['city']=='Indore') echo 'selected'?>>Indore</option>
                             <option <?php if($data['city']=='Dewas') echo 'selected'?>>Dewas</option>
                             <option <?php if($data['city']=='Ujjain') echo 'selected'?>>Ujjain</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="">Hobby</label>
                         <br>
                         Cricket : <input type="checkbox" value='Cricket' <?php if(strstr($data['hobby'], "Cricket")) echo "checked";?> name="hobby[]">
                         Football: <input type="checkbox" value='Football'<?php if(strstr($data['hobby'], "Football")) echo "checked";?> name="hobby[]">
                         Music   : <input type="checkbox" value='Music'   <?php if(strstr($data['hobby'], "Music")) echo "checked";?> name="hobby[]">
                         <br>
                     </div>
                     <input type="submit" value="Update" class="btn btn-info">
                 </div>
             </div>
        </div>
    </div>
    </form>
</div>