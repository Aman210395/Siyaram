<div class="container mt-4">
    <form action="" method="post" >
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <h3>Student Update</h3>
            <div class="form-group">
                <label>Name</label>
                <input type="text" value="<?= $result['name'];?>" name="name" class="form-control" />
            </div>
            <div class="form-group">
                <label>Gender</label>
                <Br />
                Male <input type="radio" <?php if($result['gender']=='male') echo 'checked'; ?> name="gender" value="male" />
                Female <input type="radio" <?php if($result['gender']=='female') echo 'checked'; ?> name="gender" value="female" />
            </div>
            <div class="form-group">
                <label>City</label>
                <select class="form-control" name="city">
                    <option>Select</option>
                    <?php 
                        foreach($result_city->result_array() as $city)
                        { ?>
                            <option <?php if($result['city']==$city['id']) echo 'selected'; ?> value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                        <?php 
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Fee</label>
                <input type="text" value="<?= $result['fee'];?>" name="fee" class="form-control" />
            </div>
            
            <br />
            <Br />
            <input type="submit" name="submit" value="Update" class="btn btn-primary" />

        </div>
    </div>
</form>
</div>