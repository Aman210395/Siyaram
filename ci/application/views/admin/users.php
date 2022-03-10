<div class="container mt-4" style="min-height: 600px;">
            <div class="row mt-4">
                <div class="col-md-12">
                        <h3 class="text-center">List of All Users</h3>
                        <table class="table table-dark">
                            <tr>
                                <th>S.No.</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Change</th>
                            </tr>
                            <?php
                            $n=1;
                            foreach($result->result_array() as $data)
                            { 
                                // if($data['status']==1)
                                // {
                                //     $status = "Enable";
                                // }else{
                                    
                                //     $status = "Disable";
                                // }
                                $status = $data['status']==1 ? 'Enable' : 'Disable';
                                
                                ?>
                                <tr>
                                    <td><?= $n ?></td>
                                    <td><?= $data['fullname'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['contact'] ?></td>
                                    <td><?= $status ?></td>
                                    <td><a href="<?= site_url('adminpanel/changestatus/'.$data['id'].'/'.$data['status']) ?>" class="btn btn-sm btn-warning">Change</a></td>
                                </tr>
                            <?php
                            $n++;
                            }
                            ?>

                        </table>
                </div>
            </div>
        </div>