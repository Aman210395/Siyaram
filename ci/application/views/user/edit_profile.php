
<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('profile/update') ?>" method="post">
            <div class="card">
                <div class="card-header">
                    Update Profile
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" value="<?= $data['fullname'] ?>" name="fullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" disabled value="<?= $data['email'] ?>" name="email" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address"><?= $data['address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <Br />
                        Male <input <?php if($data['gender']=='male') echo 'checked'; ?> type="radio" name="gender" value="male"/>
                        Female <input <?php if($data['gender']=='female') echo 'checked'; ?> type="radio" name="gender" value="female"/>
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <select class="form-control" name="city">
                            <option>Select</option>
                            <option <?php if($data['city']=='Indore') echo 'selected'; ?>>Indore</option>
                            <option <?php if($data['city']=='Mumbai') echo 'selected'; ?>>Mumbai</option>
                            <option <?php if($data['city']=='Pune') echo 'selected'; ?>>Pune</option>
                            <option <?php if($data['city']=='Bhopal') echo 'selected'; ?>>Bhopal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" value="<?= $data['contact'] ?>" class="form-control" name="contact">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
