<?php
require_once "boot.php";

$nameErr = $emailErr = $contactErr = $passErr = $conf_passErr = $roleErr = $countErr = $stateErr = $cityErr = "";
$name = $email = $contact = $pass = $conf_pass = $role = $count = $state = $city = $state_id = "";

?>

<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
 b{
   color:red;
   text-decoration: underline;
 }
</style>
</head>
<body> 

<h2>Signup Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  
    <label for="Username">Userame:
      <input type="text" name="name" id="name" placeholder="" value="<?php echo $name;?>">
       <span class="error">* <?php echo $nameErr;?></span>
    </label>
    <br>
    <br>
    <label for="email">Email:
      <input type="email" name="email" id="email" placeholder="" value="<?php echo $email;?>">
       <span class="error">* <?php echo $emailErr;?></span>
    </label>
    <br>
    <br>
    <label for="Phone">Phone:
      <input type="text" name="contact" placeholder="" value="<?php echo $contact;?>">
      <span class="error">* <?php echo $contactErr;?></span>
    </label>
    <br>
    <br>
    <label for="Password">Password:
      <input type="password" name="pass" placeholder="" value="<?php echo $pass;?>">
      <span class="error">* <?php echo $passErr;?></span>
    </label>
    <br>
    <br>
    <label for="Confirm Password">Confirm Password:
      <input type="password" name="conf_pass"  placeholder="" value="<?php echo $conf_pass;?>">
      <span class="error">* <?php echo $conf_passErr;?></span>  
    </label>
    <br>
    <br>
    <label for="Select Role">Select Role
    <select name="role">
      <option value="">Select</option>
      <option value="User" <?php if($role == 'User') echo "selected"; ?>>User</option>
      <option value="Admin"<?php if($role == 'User') echo "selected"; ?>>Admin</option>
    </select>
    <span class="error">* <?php echo $roleErr;?></span>
        <br>
        <br>
    <label for="Select State">Select State
    <select id="state-dropdown" name="state">
      <option value="">Select</option>
      <?php
      $sql = "SELECT * FROM state";
      $result = mysqli_query($con,$sql);
      while($data = mysqli_fetch_assoc($result))
      // print_r($data);
      { ?>
            <option value="<?php echo $data['state_id'];?>"><?php echo $data['state_title'];?></option>
      <?php }?>
    </select>
    <span class="error">* <?php echo $stateErr;?></span>
        <br>
        <br>
    <label for="Select City">Select City
    <select id="city-dropdown" name="city">
    </select>
    <span class="error">* <?php echo $cityErr;?></span>
        <br>
        <br>
   <input type="submit" name="submit" class="btn btn-sm btn-info" value="Submit"> 
   <a class="btn btn-primary btn-sm" href="login.php">Login</a> <b>If Already have an Account click here to Login!</b> 
</form>
</body>
</html>




<?php
$nameErr = $emailErr = $contactErr = $passErr = $conf_passErr = $roleErr = $countErr = $stateErr = $cityErr = "";
$name = $email = $contact = $pass = $conf_pass = $role = $count = $state = $city = $state_id = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) {
    $nameErr = "Please add a name";
  } else {
    $name = validateInput($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]+/",$name)) {$nameErr = "Only letters and white space allowed";} 
    }

  

  if (empty($_POST["pass"])) {
    $passErr = "Password is required";
  } 
  else{
    $pass = validateInput($_POST["pass"]);

    if(strlen($_POST["pass"])<8) {
      $passErr = "Your Password Must Contain At Least 8 Characters!";
  }
  elseif(!preg_match("#[0-9]+#",$pass)) {
      $passErr = "Your Password Must Contain At Least 1 Number!";
  }
  elseif(!preg_match("#[A-Z]+#",$pass)) {
      $passErr = "Your Password Must Contain At Least 1 Capital Letter!";
  }
  elseif(!preg_match("#[a-z]+#",$pass)) {
      $passErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
  }
  elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["pass"])) {
    $passErr = "Your Password Must Contain At Least 1 Special Character !"."<br>";
  }
}

if(empty($_POST["conf_pass"])) {
    $conf_passErr = "Confirm Password is required";
}
else{
    $conf_pass = validateInput($_POST["conf_pass"]);
    
    if($_POST['pass']!==$_POST["conf_pass"])
    {
       $conf_passErr = "Password & Confirm Password not Matched";
    }
}


if(empty($_POST["contact"])) {
    $contactErr = "Contact is required";
   }else {
     $contact = validateInput($_POST["contact"]);
     
     if (!preg_match("/^[0-9]*$/", $contact) ) {
        
     $contactErr = "Only Numeric Value is Allowed";
    }
    if (strlen ($contact) != 10){
    $contactErr = "Mobile No.must contain 10 digits.";
  
    }
   }
  if(empty($_POST["role"])) 
   {
    $roleErr = "Select Role";
   }
   else
   {
     $role = validateInput($_POST["role"]);
   }

   if(empty($_POST["state"])) 
   {
    $stateErr = "Select State";
   }
   else
   {
     $state = validateInput($_POST["state"]);
   }
   if(empty($_POST["city"])) 
   {
    $cityErr = "Select City";
   }
   else
   {
     $city = validateInput($_POST["city"]);
   }
  
}



// Validate Form Data 
function validateInput($data) {
  // print_r($data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

// echo $fileErr;
// echo "hello";die;
// print_r($_POST);die;
if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["contact"]) && !empty($_POST["pass"]) && !empty($_POST["conf_pass"]) && !empty($_POST["role"]) && !empty($_POST["state"]) && !empty($_POST["city"]))
  {
    // echo "hello";die;
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "james";   


  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $x = $_POST['pass'];
      $y = md5($x);

      $state_sql = "SELECT state_title from state";
      $result = mysqli_query($con,$state_sql);
      $data = mysqli_fetch_assoc($result);

      $state_title = implode("",$data);

      $city_sql = "SELECT name from city";
      $result = mysqli_query($con,$city_sql);
      $data = mysqli_fetch_assoc($result);

      $city_title = implode("",$data);

      echo $sql = "INSERT INTO user(username, email, password, phone, usertype, state, city)
      VALUES ('$name', '$email', '$y', '$contact', '$role', '$state_title', '$city_title')";
      // die;
      // use exec() because no results are returned
      $conn->exec($sql);
      header("Location: login.php");
      }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
}

?>

    
<script>
$('#state-dropdown').on('change', function() 
          {
            var state_id = this.value;
            alert(state_id);
            $.post({
                url: "cities-by-state.php",
                type: "POST",
                data: {
                    state_id: state_id
                },
                cache: false,
                success: function(result){
                  console.log(result);
                    $("#city-dropdown").html(result);
                }
            });
        });
</script>






















































































































































































































































































































































































































































































<!-- ?php -->
<!-- $con = mysqli_connect("localhost", "root", "", "tss5");
$que = "SELECT DISTINCT(city_state) FROM cities";
$result = mysqli_query($con, $que);
?>
<html>
    <head>
     <script src="jquery.js"></script>
     <script>
         $(document).ready(function(){
            $("#state").change(function(){
                var a = $("#state").val();
                $.post("city_state_server.php", {state : a},function(res){
                        console.log(res);
                })
            })
         })
     </script>

    </head>
    <body>
        <br/>
        <br/>
        Select State: <select id="state">
            <option>Select</option>
            <?php 
            // while($data=mysqli_fetch_assoc($result))
            // {
                
            //     echo "<option>".$data['city_state']."</option>";
            // }
            
            ?>
        </select>
        <br/>
        <br/>
        <br/>
        Select City: <select>
            <option>Select</option>
            <option></option>
            <option></option>
        </select>

    </body>
</html> -->


<!-- <html>
// $con = mysqli_connect("localhost", "root", "", "tss5");
// $a = $_POST['state'];
// $que = "SELECT * FROM cities WHERE city_state='$a'";    
// $result = mysqli_query($con, $que);
// $arr = array();

// while($data=mysqli_fetch_assoc($result))
// {
//     $arr[]=$data;
// }
// echo json_encode($arr);
// </html> -->