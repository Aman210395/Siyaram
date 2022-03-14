
<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Your Blogs</h3>
            <button data-toggle="modal" data-target="#addModal" class="btn btn-info">Add Your Blog</button>
            
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
                </div>
                <div class="form-group">
                    <label>Detail</label>
                    <textarea class="form-control" name="detail"></textarea>
                </div>
                
            </div>
            <div class="modal-footer">
                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close" />
                    <input type="submit" class="btn btn-success" value="Add" />
            </div>
        </div>
        </form>
    </div>
</div>

