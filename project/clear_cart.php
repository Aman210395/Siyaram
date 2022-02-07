<?php
setcookie("cart", "", time()-1);
header("location:index.php");
?>