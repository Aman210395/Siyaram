
<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('user/auth') ?>" method="post">
            <div class="card">
                <div class="card-header">
                    User Login
                </div>
                <div class="card-body">
                   
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <p class="text-danger text-center">
                        <?= $this->session->flashdata("msg") ?>
                    </p>
                    
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Login" />
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
