
<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('user/save') ?>" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    User Signup
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="fullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Re-Password</label>
                        <input type="password" name="re_pass" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Select Profile Image</label>
                        <input type="file" name="userfile" class="form-control" />
                        <small class="text-danger">
                            <?= $this->session->flashdata("err") ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <Br />
                        Male <input type="radio" name="gender" value="male"/>
                        Female <input type="radio" name="gender" value="female"/>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <select class="form-control" name="city">
                            <option>Select</option>
                            <option>Indore</option>
                            <option>Mumbai</option>
                            <option>Pune</option>
                            <option>Bhopal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" class="form-control" name="contact">
                    </div>
                    <?php
                        
                        echo $cap['image'];
                    ?>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Signup" />
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
