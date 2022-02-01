<?php 
include("../config/db.php");

if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
}
include("includes/header.php");
include("includes/navbar.php");

$que = "SELECT * FROM logo";

$result = mysqli_query($con, $que);

// echo $result;
// print_r($result);

// $data = mysqli_fetch_assoc($result);
// print_r($data);
// $data = mysqli_fetch_assoc($result);
// print_r($data);

?>

<div class="container mt-5" style="min-height: 600px;">
    <div class="row">
        <div class="col-md-6 offset-md-2">
    <h3 class="text-center">View Logo</h3>
    <table class="table table-boaderd table-striped table-dark">
        <tr>
            <td>S.No.</td>
            <td>Logo</td>
        </tr>
        <?php 
        while($data = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>".$data["id"]."</td>";
            echo "<td>".$data["logo_image"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>
        </div>
    </div>
</div>