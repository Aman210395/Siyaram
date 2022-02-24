<?php
include("config/db.php");
if(isset($_SESSION['is_user_logged_in']))
{
    header("location:profile.php");
}


include("includes/preloader.php");
include("includes/header.php");
?>

<div class="container m-5" style="min-height:500px">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">User Login</h4>
            
            <div class="form-group">
                <label>Username/Email</label>
                <input type="text" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" />
            </div>
            <br />
            <Br />
            <input type="button" id="btn" value="Login" class="btn btn-success" />
            <p class="text-danger text-center">
            
            </p>
        </div>
    </div>

</div>
<?php
include("includes/footer.php");
?>
<script>
    $(document).ready(function(){
        $("#btn").click(function(){
            var e = $("[name='email']").val();
            var p = $("[name='pass']").val();
            $.post("api_auth.php", { email : e, pass : p }, function(res){
                res = JSON.parse(res);
                if(res.success == 'true')
                {
                    window.location.href="profile.php";
                }
                if(res.type == 1)
                {
                    $(".text-danger").html("This Username and Password is Incorrect");
                }
                if(res.type==2)
                {
                    $(".text-danger").html("This Password is Incorrect");

                }
                if(res.type==3)
                {
                    $(".text-danger").html("You are disabled User");

                }
            })
        })
    })
</script>