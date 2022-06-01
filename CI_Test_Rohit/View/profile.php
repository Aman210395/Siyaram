<title><?php print_r($title)?></title>
<div class="container mt-3" style="min-height:600px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center">User Profile</h3>
             <?php print_r($data) ?>
            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <td>Fullname</td>
                    <td><?=$data['fullname']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$data['email']?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?=$data['contact']?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?=$data['gender']?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?=$data['address']?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?=$data['city']?></td>
                </tr>
                <tr>
                    <td>Hobby</td>
                    <td><?=$data['hobby']?></td>
                </tr>
            </table>
            <a class="btn btn-success" href="<?=site_url('Profile/Edit_Profile')?>">Edit Profile</a>
            <a class="btn btn-success" href="<?=site_url('Profile/change_password')?>">Change Password</a>
        </div>
    </div>
</div>