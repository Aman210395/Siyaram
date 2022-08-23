<html>
    <head>
<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
<script src="<?=base_url('assets/js/jquery-3.6.0.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
    </head>
    <body>
    <div class="container mt-5" style="min-height:600px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center">User's Profile</h3>
            <table class="table table-bordered table-striped mt-3">
                <tr>
                   <th>Fullname</th> 
                   <th><?=$data['fullname']?></th> 
                </tr>
                <tr>
                   <th>Email</th> 
                   <th><?=$data['email']?></th> 
                </tr>
                <tr>
                   <th>City</th> 
                   <th><?=$data['city']?></th> 
                </tr>
                <tr>
                   <th>Hobby</th> 
                   <th><?=$data['hobby']?></th> 
                </tr>
                <tr>
                   <th>Gender</th> 
                   <th><?=$data['gender']?></th> 
                </tr>
            </table>
            <a class="btn btn-danger" href="<?=site_url('Profile/user_logout')?>">Logout</a>
            <a class="btn btn-primary" href="<?=site_url('Profile/edit')?>?id=<?=$data['id']?>">Edit Profile</a>
            <a class="btn btn-success" href="<?=site_url('Profile/edit_pass')?>">Change Password</a>
        </div>
    </div>
</div>
    </body>
</html>