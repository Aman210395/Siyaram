<html>
    <head>
  <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
  <script src="<?=base_url('assets/js/jquery-3.6.0.min.js')?>"></script>
  <script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
    </head>
    <body>
        <div class="container mt-5" style="min-height:600px;">
        <form action="<?=site_url('Profile/update_password')?>" method="post">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                           <h3 class="text-center">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="text" name="new_pass" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password</label>
                                <input type="text" name="conf_pass" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-success btn-block">
                        </div>
                        <p class="text-danger text-center">
                            <?php echo $this->session->flashdata("Msg")?>
                        </p>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>