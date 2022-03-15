<script>
    $(document).ready(function(){
        <?php
            if($this->session->flashdata("err"))
            { ?>
                $("#addModal").modal("show");

            <?php }
        ?>
    })
</script>
<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-12">
            <button data-toggle="modal" data-target="#addModal" class="btn btn-info">Add Your Blog</button>
            <h3 class="text-center">Your Blogs</h3>

            <Br />
            <?php
            foreach($result->result_array() as $data)
            {
            ?>

            <div class="col-md-12 mb-4" style="border-bottom: 2px solid #000;">
               <div class="row">
                  <div class="col-md-3">
                     <img src="<?= base_url('assets/blog_img/'.$data['image']) ?>" height="200" class="img-thumbnail">
                  </div>
                  <div class="col-md-9">
                     <h4><?= $data['title'] ?></h4>
                     <h6><?= $data['category'] ?></h6>
                     <p><?= $data['detail']; ?></p>
                     <a href="#" class="btn btn-info btn-sm">Edit</a>
                     <a href="#" class="btn btn-danger btn-sm">Delete</a>
                  </div>
               </div>
            </div>

            <?php } ?>
        </div>
    </div>
</div>


<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <form action="<?= site_url('blog/add') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Blog</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="category">
                        <option>Select</option>
                        <option>Travel</option>
                        <option>Education</option>
                        <option>Technology</option>
                        <option>Helth</option>
                        
                    </select>

                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="userfile" class="form-control" />
                    <small class="text-danger">
                        <?= $this->session->flashdata("err");
                        ?>
                    </small>
                </div>
                <div class="form-group">
                    <label>Detail</label>
                    <textarea class="form-control" name="detail"></textarea>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>

