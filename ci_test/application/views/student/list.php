<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <h3>List of All Student</h3>

            <?php
            if($result->num_rows()==0){ ?>
                <div class="alert alert-danger">
                    <p>Not Data Found</p>
                </div>
            <?php 
            }else{
            ?>

            <table class="table table-dark">
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Fee</th>
                    <th>City</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                <?php
                $n=1;
                foreach($result->result_array() as $data)
                { ?>
                    <tr>
                        <td><?= $n ?></td>
                        <td><?= $data['sname'] ?></td>
                        <td><?= $data['gender'] ?></td>
                        <td><?= $data['fee'] ?></td>
                        <td><?= $data['cname'] ?></td>
                        <td><a href="<?= site_url('student/delete/'.$data['sid']) ?>" class="btn btn-sm btn-danger">Delete</a></td>
                        <td><a href="<?= site_url('student/update/'.$data['sid']) ?>" class="btn btn-sm btn-info">Update</a></td>
                    </tr>
                <?php 
                $n++;
                    }

                ?>
            </table>
            <?php } ?>
        </div>
    </div>
</div>