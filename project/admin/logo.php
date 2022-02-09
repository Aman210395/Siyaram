<?php
include("../config/db.php");
if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
}

include("includes/header.php");
include("includes/navbar.php");

$result = mysqli_query($con, "SELECT * FROM logo");
?>
<div class="container mt-4" style="min-height: 600px;">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="save_logo.php" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Logo</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Select Logo Image</label>
                        <input type="file" name="logo" class="form-control"/>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Add"/>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <table class="table table-dark">
                <tr>
                    <th>S.No.</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th>Change</th>
                </tr>
                <?php
                $n=1;
                while($data=mysqli_fetch_assoc($result))
                { 
                    if($data['status']==1){

                        $x = "Activated";
                        $y = "disabled";
                    }
                    else{
                        
                        $x = "Deactivated";
                        $y = "";
                    }
                    
                    ?>
                    <tr>
                        <td><?= $n ?></td>
                        <td><img src="logos/<?= $data['logo_name']; ?>" height="80" width="80" /></td>
                        <td><?= $x ?></td>
                        <td><a  href="change_logo.php?id=<?= $data['id'] ?>" class="btn btn-info <?= $y ?>">Activate</a></td>
                    </tr>
                <?php 
                $n++;
                }
                ?>
            </table>
        </div>
    </div>
</div>