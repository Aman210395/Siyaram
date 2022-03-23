
<div class="container" style="min-height: 600px; margin-top:50px; margin-bottom:50px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="<?= site_url('user/my_submit') ?>" method="post">
            <div class="card">
                <div class="card-header">
                    User Signup
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="full_name"/>

                        <input type="hidden" name="captcha_str" value="<?= $cap['word'] ?>" />
                        <label>Captcha</label>
                        <Br />
                        <?php
                            
                            echo $cap['image'];
                            
                        ?>
                        <br />
                        
                        <input type="text" class="form-control" name="captcha_txt"/>
                        <p class="text-danger">
                            <?= $this->session->flashdata("captcha_err"); ?>
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="Signup" />
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
