<?php
include("../config/db.php");
if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
}
include("includes/header.php");
include("includes/navbar.php");


$que = "SELECT id, fullname, email, contact, status FROM user";
$result = mysqli_query($con, $que);
?>
<div class="container mt-3" style="min-height:600px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4 class="text-center">View All Users</h4>
            <table class="table table-dark table-bordered table-striped">
                <tr>
                    <th>S.No.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Change</th>
                    
                </tr>
                <?php
                $n=1;
                while($data=mysqli_fetch_assoc($result))
                {
                    if($data['status']==1)
                        $a = "Enable";
                    else
                        $a = "Disable";
                    
                    ?>
                    <tr>
                        <td><?= $n ?></td>
                        <td><?= $data['fullname'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['contact'] ?></td>
                        <td><?= $a ?></td>
                        <td><a href="change_status.php?id=<?= $data['id'] ?>" class="btn btn-info btn-sm">Change</a></td>

                    </tr>
                <?php 
                $n++;
                }
                ?>
            </table>
        </div>
    </div>
</div>