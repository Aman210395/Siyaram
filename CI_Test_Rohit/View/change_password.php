<title><?=$title?></title>
<div class="container">
    <form action="<?=site_url('Profile/Update_password')?>" method="post">
    <div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="text-center">Update Password</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Current Password</label>
                    <input type="password" class="form-control" name="curr_pass">
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control" name="new_pass">
                </div>
                <div class="form-group">
                    <label for="">Confirm New Password</label>
                    <input type="password" class="form-control" name="conf_new_pass">
                </div>
                <p class="text-danger text-center">
                    <?php
                       echo $this->session->flashdata("Msg");
                     ?>
                </p>
                <input type="submit" class="btn btn-block btn-info">
            </div>
        </div>
        </div>
    </div>
    </form>
</div>