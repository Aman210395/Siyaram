<?php 
include("../config/db.php");

if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
}
include("includes/header.php");
include("includes/navbar.php");
?>
</body>
    </html>