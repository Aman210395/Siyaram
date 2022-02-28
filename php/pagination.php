<?php
$con = mysqli_connect("localhost", "root", "", "tss5");

$que_total = "SELECT COUNT(*) AS total FROM cities";
$result_total = mysqli_query($con, $que_total);
$data_total = mysqli_fetch_assoc($result_total);

$rec_per_page = 200;
$total_rec = $data_total['total'];
$total_pages = ceil($total_rec/$rec_per_page);


if(isset($_GET['pageno']))
{
    $pageno = $_GET['pageno']; // 7
    $a = $pageno-1;
    $b = $a*$rec_per_page;
    $que = "SELECT * FROM cities LIMIT  $b, $rec_per_page";
    $result = mysqli_query($con, $que);
}
else
{
    $pageno=1;
    $b=0;
    $que = "SELECT * FROM cities LIMIT $rec_per_page";
    $result = mysqli_query($con, $que);
}
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h4 class="text-center">Pagination in PHP</h4>
                    <ul class="pagination">
                        <li class="page-item <?php if($pageno==1){ echo 'disabled'; }?>">
                            <a class="page-link" href="pagination.php?pageno=<?= $pageno-1 ?>">Pre</a>
                        </li>
                        <?php
                        for($i=1; $i<=$total_pages; $i++)
                        { ?>
                            <li class="page-item <?php if($pageno==$i){ echo 'active'; } ?>"><a class="page-link" href="pagination.php?pageno=<?= $i ?>"><?= $i ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item <?php if($pageno==$total_pages){ echo 'disabled'; } ?>">
                            <a class="page-link" href="pagination.php?pageno=<?= $pageno+1 ?>">Next</a>
                        </li>

                        
                    </ul>
                    <table class="table table-dark table-hover table-striped table-bordered">
                        <tr>
                            <th>S.No.</th>
                            <th>City Name</th>
                            <th>State Name</th>
                        </tr>
                        <?php
                        $n=$b+1;
                        while($data = mysqli_fetch_assoc($result))
                        {
                        ?>
                            <tr>
                                <td><?= $n ?></td>
                                <td><?= $data['city_name'] ?></td>
                                <td><?= $data['city_state'] ?></td>
                            </tr>

                        <?php
                        $n++;
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </body>
</html>