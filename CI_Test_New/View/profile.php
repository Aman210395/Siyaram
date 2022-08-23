<html>
    <head>
        <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
        <script src="<?=base_url('assets/js/jquery-3.6.0.min.js')?>"></script>
        <script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
         <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Admin Page</h3>
                    <table class="table table-bordered table-striped table-hover mt-3">
                        <tr>
                            <td>S.No.</td>
                            <td>Fullname</td>
                            <td>Email</td>
                            <td>City</td>
                            <td>Hobby</td>
                            <td>Gender</td>
                            <td>Action</td>
                            <td>Change</td>
                            <td>Status</td>
                        </tr>

                        <?php
                         foreach($data as $x)
                         { ?>
                             <tr>
                                <td><?=$x['id']?></td>
                                <td><?=$x['fullname']?></td>
                                <td><?=$x['email']?></td>
                                <td><?=$x['city']?></td>
                                <td><?=$x['hobby']?></td>
                                <td><?=$x['gender']?></td>
                                <td>
                                    <a  href="<?=site_url('Profile/delete')?>?id=<?=$x['id']?>">
                                    <i class="fa fa-trash">
                                        
                                    </i>
                                    </a>
                                    <a  href="<?=site_url('Profile/edit')?>?id=<?=$x['id']?>">
                                    <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="<?=site_url('Profile/change_status')?>?id=<?=$x['id']?>">Change</a>
                                </td>
                                <?php
                                 if($x['status']==1)
                                 { ?>
                                      <td>Enable</td>
                                <?php }
                                else
                                { ?>
                                      <td>Disable</td>
                                       
                               <?php }

                               ?>
                             </tr>
                             
                        <?php }

                       ?>
                    </table>
                    <a class="btn btn-danger btn-sm" href="<?=site_url('Profile/logout')?>">Logout</a>
                </div>
            </div>
         </div>
    </body>
</html>