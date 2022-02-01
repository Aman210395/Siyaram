<?php 
include("../config/db.php");

if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
}
include("includes/header.php");
include("includes/navbar.php");

$que = "SELECT * FROM category";

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
    <h3 class="text-center">View Category</h3>
    <table class="table table-boaderd table-striped table-dark">
        <tr>
            <td>S.No.</td>
            <td>Category Name</td>
            <td>Delete</td>
        </tr>
        <?php 
        while($data = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>".$data["id"]."</td>";
            echo "<td>".$data["name"]."</td>";
            echo "<td><a href = 'delete_product.php?id=".$data['id']."' class='btn btn-danger btn-sm'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
        </div>
    </div>
</div>