<div class="container mt-4">
    <form action="" method="post" >
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h3>Login Page</h3>
            
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" />
            </div>
            
            <br />
            <p class="text-center text-danger">
                <?= $this->session->flashdata("msg"); ?>
            </p>
            <Br />
            <input type="submit" name="submit" value="Login" class="btn btn-primary" />

        </div>
    </div>
</form>
</div>