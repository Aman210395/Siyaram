
<?php echo $this->benchmark->elapsed_time();?>

<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center">User Profile Page</h3>
            
            <table class="table table-bordered">
                <tr>
                    <td>Full Name</td>
                    <td><?= $data['fullname'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $data['email'] ?></td>
                </tr>
                <tr>
                    <td>Profile</td>
                    <td><img src="<?= base_url("assets/user_images/".$data['user_image']); ?>" height="80" width="80" /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?= $data['address'] ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?= $data['gender'] ?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?= $data['contact'] ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?= $data['city'] ?></td>
                </tr>
                
            </table>
            <br />
            <a href="<?= site_url('profile/edit_profile') ?>" class="btn btn-info">Edit Profile</a>
            <a href="<?= site_url('profile/change_password') ?>" class="btn btn-info">Change Password</a>
        </div>
    </div>
</div>
