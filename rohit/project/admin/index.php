<?php
include("../config/db.php");
?>

<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="auth.php" method="post">
                    <h3 class="text-center">Admin Login</h3>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" />
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />
                            </br>
                            <input type="submit" value="Login" class="btn btn-dark" />
                            </br>
                            <p class="text-center text-danger">
                                <?php
                                if (isset($_SESSION['msg'])) {
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                    
                                }
                                ?>
                            </p>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>