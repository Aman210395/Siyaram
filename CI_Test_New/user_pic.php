<html>
    <head>
<link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
<script src="<?=base_url('assets/js/jquery-3.6.0.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.bundle.js')?>"></script>
    </head>
    <body>
   <div class="container">
<form action="<?=site_url('Profile/update_prof_pic')?>" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6 offset-md-3">
           <h4 class="text-center mt-5">Profile Pic</h4>
        <div>
            <br>
            <br>
             <?php 
            if($this->session->userdata('pic')!="")
            {
              $name = $this->session->userdata('pic');
            }
            else{
              $name = "admin.png";
            }
            ?> 
             <img src="<?=base_url('assets/prof_img/'.$name)?>" height=100 width=100 alt="user profile pic"> 
        </div>
           <br />
           <br />
           <div class="form-group">
             <label for="">Select File</label>
           <input type="file" name="userfile" class="form-control">
           <br>
            <small class="text-danger">
              <?php echo $this->session->flashdata("Msg")?>
          </small>
           </div>
           <br>
           <input type="submit" class="btn btn-info" value="Submit">
       </div>
    </div>
      </form>
   </div>
    </body>
</html>









        
































































<!-- <?php 
// include("config.php");

// $a = $_SESSION['id'];

// $que = "SELECT profile_pic from user WHERE id = '$a'";

// $result = mysqli_query($con,$que);
// $data = mysqli_fetch_assoc($result);

// echo $data;die;

// $res = implode("",$data);
// echo $res;die;

//  unlink("uploads/".$res);


// $image_url = ''; 
// if(isset($_POST['change']))
//  { 
//     $fileName = $_FILES['file']['name'];  
//     $fileTmpName = $_FILES['file']['tmp_name'];
//     $fileSize = $_FILES['file']['size'];
//     $fileError = $_FILES['file']['error'];
//     $maxFileSize = 200000;
//     $fileExt = explode(".", $fileName);
//     $currFileExt = strtolower(end($fileExt));
//     $allowed = array('jpg', 'jpeg', 'png', 'gif');

//     if($_FILES['file']['error'] == 0)
//     {
//         if(in_array($currFileExt, $allowed))
//     {
//         if($fileSize < $maxFileSize) {
//             if($fileError == 0)
//             {
//                 $uniqueFileName = uniqid('',true).".".$currFileExt;

//                  $_SESSION['profile_pic'] = $uniqueFileName;

//                 move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$uniqueFileName);
//                 $image_url = 'uploads/'.$uniqueFileName;

//                 $sql = "UPDATE user SET profile_pic='$uniqueFileName' WHERE id='$a'";

//                 mysqli_query($con, $sql);

//                 header("location:prof_pic.php"); 

//             } 
//             else 
//             {
//                 $_SESSION['msg'] = 'There is an error in uploading file'; 
//                 header("location:prof_pic.php");
//             }
//         } 
//         else 
//         {    
//             $_SESSION['msg'] = 'File Size is bigger'; 
//             header("location:prof_pic.php");
//         }
//        }
//        else
//      {
//         $_SESSION['msg'] = 'Only jpg,jpeg,png & gif are allowed'; 
//         header("location:prof_pic.php");
//      }
//     }
//     else
//     {
//         $_SESSION['msg'] = "Select File";
//         header("location:prof_pic.php");
//     }
// }



// ?>


