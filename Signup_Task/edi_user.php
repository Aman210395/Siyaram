<?php
include("config.php");

$que = "SELECT * FROM user WHERE id = '$_GET[id]'";
$result = mysqli_query($con,$que);
$data = mysqli_fetch_assoc($result);

// print_r($data);
// die;

//Array ( [id] => 4 [username] => Aman [email] => aman@gmail.com [password] => Aman@123 [phone] => 9753731211 [usertype] => user [status] => 1 )

// die;
// $id = $_SESSION['id'];
?>

<html>
    <head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="adminhome.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
  </div>
</nav>

<br>
        <div class="container mt-4" style="min-height:600px;">
        <form action="update_user.php" method="post">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Edit User Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="name" value="<?=$data['username']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="<?=$data['email']?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" value="<?=$data['phone']?>" class="form-control">
                            </div>
                                <br>
                                <input type="hidden" name="abc" value="<?=$data['id']?>">
                                <input type="submit" value="Submit" class="btn btn-block btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>








