<html>
    <head>
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <script src="<?=base_url('assets/js/jquery-3.6.0.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
    </head>
    <body>
        <div class="container mt-5" style="min-height:600px">
        <form action="<?=site_url('Home/save')?>" method="post">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Signup Page</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <label>Fullname</label>
                            <input type="text" name="fullname" value="<?php echo set_value('fullname'); ?>" class="form-control">
                            <div class="text-danger">
                            <?php echo form_error('fullname'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                            <div class="text-danger">
                            <?php echo form_error('email'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control">
                            <div class="text-danger">
                            <?php echo form_error('password'); ?>
                          </div>
                          </div>
                          <div class="form-group">
                            <label>City</label>
                            <select class="form-control" name="city">
                                <option value="">Select</option>
                                <option value="Indore">Indore</option>
                                <option value="Bhopal">Bhopal</option>
                                <option value="Ujjain">Ujjain</option>
                            </select>
                            <div class="text-danger">
                            <?php echo form_error('city'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Hobby</label>
                            <br>
                            Music : <input type="checkbox" value="Music" name="hobby[]">
                            Cricket : <input type="checkbox" value="Cricket" name="hobby[]">
                            Football : <input type="checkbox" value="Football" name="hobby[]">
                            <div class="text-danger">
                            <?php echo form_error('hobby[]'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                              <option value="">Select</option>
                              <option value="Admin">Admin</option>
                              <option value="User">User</option>
                            </select>
                            <div class="text-danger">
                            <?php echo form_error('role'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label>Gender</label>
                            <br>
                            Male : <input type="radio" name="gender" value="male">
                            Female : <input type="radio" name="gender" value="female">
                            Other : <input type="radio" name="gender" value="other">
                          </div>
                          <div class="text-danger">
                          <?php echo form_error('gender'); ?>
                          </div>
                          <br>
                          <input type="submit" value="Signup" class="btn btn-success btn-block">
                          <p class="text-danger text-center">
                          <?php
                          echo $this->session->flashdata("Msg");
                          ?>
                         </p>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>