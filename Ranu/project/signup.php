<?php
include("config/db.php");
include("includes/preloader.php");
include("includes/header.php");
?>
<div class="container m-5" style="min-height:500px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
          
          <form action="save.php" method="post">
              <div class="card">
                  <div class="card-header bg-success">
                  <h4>user Registration</h4>

                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <label for="">First Name</label>
                          <input type="text"name="firstname" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="">Last Name</label>
                          <input type="text"name="lastname" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="">Email</label>
                          <input type="text"name="email" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="">password</label>
                          <input type="password"name="password" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="">contact No.</label>
                          <input type="text"name="contact" class="form-control"/>
                      </div>
                      <div class="form-group">
                          <label for="">Address</label>
                          <textarea rows="3"cols="60" name="address"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="">Gender :</label>
                          Male:<input type="radio"name="gender" value="male" />
                         Female:<input type="radio"name="gender"  value="female"/>

                      </div>
                      <div class="form-group">
                          <label for="">City :</label>
                          <br/>
                          <select class="form-control" name="city">
                              <option>select</option>
                              <option>Indore</option>
                              <option>Bhopal</option>
                              <option>Mumbai</option>
                              <option>Pune</option>
                              <option>Delhi</option>
                          </select>
                      </div>
                      
                  </div>
                  <div class="card-footer bg-success">
                      <input type="submit" value="signup" class="btn btn-primary"/>
                  </div>
              </div>
          </form>
        </div>
   </div>
</div>

<?php
include("includes/footer.php");
?>