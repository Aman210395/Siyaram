<html>
    <head>
        <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
        <script src="<?=base_url('assets/js/jquery-3.6.0.min.js')?>"></script>
        <script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
    </head>
    <body>
        <div class="container mt-3" style="min-height:600px;">
        <form action="<?=site_url('Profile/update')?>" method="post">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">User's Edit Page</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Fullname</label>
                                <input type="text" name="fullname" value="<?=$data['fullname']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="<?=$data['email']?>"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <select class="form-control" name="city">
                                    <option value="">Select</option>
                                    <option value="Indore" <?php if($data['city']=='Indore') echo 'selected'?>>Indore</option>
                                    <option value="Bhopal" <?php if($data['city']=='Bhopal') echo 'selected'?> >Bhopal</option>
                                    <option value="Ujjain" <?php if($data['city']=='Ujjain') echo 'selected'?> >Ujjain</option>
                                    <option value="Dewas" <?php if($data['city']=='Dewas') echo 'selected'?> >Dewas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hobby</label>
                                <br>
                               Music : <input type="checkbox" value="Music" <?php if(strstr($data['hobby'], "Music")) echo "checked";?> name="hobby[]">
                               Cricket : <input type="checkbox" value="Cricket" <?php if(strstr($data['hobby'], "Cricket")) echo "checked";?> name="hobby[]">
                               Football : <input type="checkbox" value="Football" <?php if(strstr($data['hobby'], "Football")) echo "checked";?> name="hobby[]">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <br>
                                Male : <input type="radio" <?php if($data['gender']=='male') echo 'checked'?>  value="male" name="gender">
                                Female : <input type="radio" <?php if($data['gender']=='female') echo 'checked'?> value="female" name="gender">
                            </div>

                            <input type="hidden" name="id" value="<?=$data['id']?>">
                            <input type="submit" value="Update" class="btn btn-block btn-success">
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>