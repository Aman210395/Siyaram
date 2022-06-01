<div class="container mt-4">
    <form action="<?=site_url('Home/auth')?>" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
            <h3 class="text-center">Login Page</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Username/Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <p class="text-danger text-center">
                        <?php echo $this->session->flashdata("Msg")?>
                    </p>
                    <input type="submit" value="Login" class="btn btn-block btn-success">
                </div>
            </div>
        </div>        
    </div>
    </form>
</div>