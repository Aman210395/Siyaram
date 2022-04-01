<div class="container mt-4">
    <form action="" method="post" >
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h3>Student Add</h3>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Gender</label>
                <Br />
                Male <input type="radio" name="gender" value="male" />
                Female <input type="radio" name="gender" value="female" />
            </div>
            <div class="form-group">
                <label>City</label>
                <select class="form-control" name="city">
                    <option>Select</option>
                    <?php 
                        foreach($result_city->result_array() as $city)
                        { ?>
                            <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                        <?php 
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Fee</label>
                <input type="text" name="fee" class="form-control" />
            </div>
            
            <br />
            <Br />
            <input type="submit" name="submit" value="Add" class="btn btn-primary" />

        </div>
    </div>
</form>
</div>