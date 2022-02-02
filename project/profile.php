<?php
include("config/db.php");

if(! isset($_SESSION['is_user_logged_in']))
{
    header("location:login.php");
}

$que_user = "SELECT * FROM user WHERE id = ".$_SESSION['id'];
$result_user = mysqli_query($con, $que_user);
$data_user = mysqli_fetch_assoc($result_user);

// print_r($data_user);


include("includes/preloader.php");
include("includes/header.php");
?>
<div class="container m-5" style="min-height:500px">
<form action="auth.php" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">User Profile</h4>
            <table class="table table-bordered table-hover table-stiped mt-3">
                <tr>
                    <td>Full Name</td>
                    <td><?= $data_user['fullname'] ?></td>
                </tr>
                <tr>
                    <td>Email/Username</td>
                    <td><?= $data_user['email'] ?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?= $data_user['contact'] ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?= $data_user['address'] ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?= $data_user['city'] ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?= $data_user['gender'] ?></td>
                </tr>
            </table>
            <br />
            <a class="btn btn-info" href="edit_profile.php">Edit Profile</a>
        </div>
    </div>
</form>
</div>
<?php
include("includes/footer.php");
?>