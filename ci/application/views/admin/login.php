<html>
    <Head>
        <title>Admin Login</title>
        <link type="Text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>" />
        <script src="<?= base_url('assets/js/jquery-3.4.1.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
    </Head>
    <body>
        <div class="container mt-4">
            <div class="row mt-4">
                <div class="col-md-6 offset-md-3">
                        <h3 class="text-center">Admin Login</h3>
                        <form action="<?= site_url('admin/auth') ?>" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <p class="text-danger text-center">
                            <?= $this->session->flashdata("msg"); ?>

                        </p>
                        <Br />
                        <input type="submit" class="btn btn-primary" value="Login">
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>