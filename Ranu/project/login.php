<?php
include("config/db.php");
include("includes/preloader.php");
include("includes/header.php");
?>
<div class="container m-5" style="min-height:500px">
<form action="auth.php" method="post">
    <div class="row">
        <div class="col-md-6 offset-md-3">
          <h3 class="text-center bg-success">user login</h3>
          
          <div class="form-group">
            <label>Username/Email</label>
            <input type="text" name="email"class="form-control"/>
          </div>
        
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control"/>
          </div>
          <br/>
          <br/>
          <input type="submit" value="login "class="btn btn-success btn-block"/>
          <p class="text-center text-danger">

         <?php

          if(isset($_SESSION['msg']))
          {
           echo $_SESSION['msg'];
           unset($_SESSION['msg']);
          }
          ?>
          </p>
        </div>
        
   </div>
</form>
</div>

<?php
include("includes/footer.php");
?>