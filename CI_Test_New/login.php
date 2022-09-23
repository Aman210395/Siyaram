<html>
    <head>
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <script src="<?=base_url('assets/js/jquery-3.6.0.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
    </head>
    <body>
        <div class="container mt-5" style="min-height:600px">
        <form action="<?=site_url('Home/auth')?>" method="post">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                           <h3 class="text-center">Login Page</h3>
                        </div>
                        <div class="card-body">
                        <div class="form-group">
                            <label>Email/Username</label>
                                <input type="text" name="email" class="form-control">
                             </div>
                        <div class="form-group">
                            <label>Password</label>
                                <input type="password" name="password" class="form-control">
                             </div>
                             <br>
                             <input type="submit" value="Login" class="btn btn-success btn-blocK">
                             <br>
                             <p class="text-center text-danger">
                                <?php echo $this->session->flashdata("Msg")?>
                             </p>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>