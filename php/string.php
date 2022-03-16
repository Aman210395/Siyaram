<html>
    <head>

    </head>
    <body>
       <?php
        $a = "10.jpg";
       ?>
       <h1><?= "<img src='".$a."' />" ?></h1>
    </body>
</html>
<?php
// $a = $_SESSION['id'];
$que = "SELECT * FROM user id = ".$a;

$que = "SELECT * FROM user id =".$_SESSION['id']. " ";


?>