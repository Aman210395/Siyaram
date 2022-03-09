
<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('profile/update_password') ?>" method="post">
            <div class="card">
                <div class="card-header">
                    Update Password
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="cur_pass" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_pass" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="conf_pass" class="form-control" />
                    </div>

                    <p class="text-danger text-center">
                        <?= $this->session->flashdata("msg") ?>
                    </p>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
