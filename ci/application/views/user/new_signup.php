
<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('user/new_signup') ?>" method="post">
            <div class="card">
                <div class="card-header">
                    User Signup
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" value="<?= set_value('fullname') ?>" name="fullname" class="form-control">
                        <div class="text-danger">

                            <?php echo form_error("fullname"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" value="<?= set_value('email') ?>" name="email" class="form-control">
                        <div class="text-danger">

                            <?php echo form_error("email"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" value="<?= set_value('password') ?>" name="password" class="form-control">
                        <div class="text-danger">

                            <?php echo form_error("password"); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Re-Password</label>
                        <input type="password" value="<?= set_value('re_pass') ?>" name="re_pass" class="form-control" />
                        <div class="text-danger">

                            <?php echo form_error("re_pass"); ?>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Signup" />
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
