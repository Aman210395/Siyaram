<?php
include("config.php");

if(! isset($_SESSION["is_admin_logged_in"]))
{
    header("location:login.php");
}


?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a><img src="uploads/admin.jpg" height=85 width=85></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
    <h3 class="text-center mt-4">Admin Page</h3>

</body>
</html>
<?php

$que = "SELECT * FROM user WHERE usertype = 'user'";

$result = mysqli_query($con, $que);
?>

<div class="container mt-3" style="min-height:600px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4 class="text-center mt-4">List of User</h4>
            <table class="table table-dark table-bordered table-stripped">
                <tr>
                    <th>S.No.</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Change</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                <?php
                // Array ( [id] => 1 [username] => admin [email] => admin@gmail.com [phone] => 9753731211 [password] => 1234 [usertype] => admin ) Array ( [id] => 2 [username] => user [email] => user@gmail.com [phone] => 9826690574 [password] => 4321 [usertype] => user )
                // print_r($data);die;
                $n=1;
                while($data = mysqli_fetch_assoc($result))
                { 
                    if($data['status']==1)
                    {
                        $a = "Enable";
                    }
                    else
                    {
                        $a = "Disable";
                    }
                    
                    ?>
                   <tr>
                       <td><?=$n?></td>
                       <td><?=$data['username']?></td>
                       <td><?=$data['email']?></td>
                       <td><?=$data['phone']?></td>
                       <td><?=$data['usertype']?></td>
                       <td><?=$a?></td>
                       <td><a href="change_status.php?id=<?=$data['id']?>"class="btn btn-info btn-sm">Change</a></td>
                       <td><a href="delete_user.php?id=<?=$data['id']?>"class="btn btn-danger btn-sm">Delete</a></td>
                       <td><a href="edit_user.php?id=<?=$data['id']?>"class="btn btn-primary btn-sm">Edit</a></td>
                   </tr>
               <?php 
               $n++;
               } 
                ?>
             </table>
        </div>
    </div>
</div>
