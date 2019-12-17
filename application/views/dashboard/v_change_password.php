
    <div class="container">
            <div class="login-form">
                <form action="<?=base_url('dashboard/change_password/')?>" method="POST">
                    <h2 class="text-center">Change Password</h2> 
                    <?php 
                        if($this->session->flashdata('status')) {
                            echo $this->session->flashdata('status');
                        }
                    ?>
                    
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                    </div>
                    <p> <?= form_error('password'); ?> </p>   
                    <div class="form-group">
                        <input type="password" name="passconf" class="form-control" placeholder="Password Confirmation" required="required">
                    </div>
                    <p> <?= form_error('passconf'); ?> </p>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log in</button>
                    </div>                     
                </form>
                <p class="text-center"><a href="<?=base_url('dashboard/profile')?>">Back to Profile</a></p>
        </div>
    </div>