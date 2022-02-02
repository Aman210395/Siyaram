<?php
include("../config/db.php");
if(! isset($_SESSION['is_admin_logged_in']))
{
    header("location:../index.php");
}
include("includes/header.php");
include("includes/navbar.php");

$que = "SELECT * FROM slider";

$result = mysqli_query($con, $que);

// $data = mysqli_fetch_assoc($result);

// ("name"=>"Elector")


?>
<div class="container mt-3" style="min-height:600px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4 class="text-center">View All Slider Image</h4>
            <table class="table table-dark table-bordered table-striped">
                <tr>
                    <th>S.No.</th>
                    <th>Title</th>
                    <th>Text</th>
                    <th>Image</th>
                </tr>
                <?php
                while($data = mysqli_fetch_assoc($result))
                {
                    // echo "<tr>";
                    // echo "<td>".$data['id']."</td>";
                    // echo "<td>".$data["title"]."</td>";
                    // echo "<td>".$data["text"]."</td>";
                    // echo "<td><img src='../slider_img/".$data['image']."' height='100' width='100' /></td>";
                    // echo "</tr>";

                    ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><?= $data['text'] ?></td>
                        <td><img src="../slider_img/<?= $data['image'] ?>" height="100" width="100"/></td>
                    </tr>

                <?php }
                ?>
            </table>
        </div>
    </div>
</div>