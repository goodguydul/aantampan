
    <div class="container">
            <div class="login-form">
                <form action="<?=base_url('login/reset_password/'.$token)?>" method="POST">
                    <h2 class="text-center">Password Reset</h2> 
                    <?php 
                        if($this->session->flashdata('status')) {
                            echo $this->session->flashdata('status');
                        }
                    ?>
                    <h5>Hello <span><?= $nama; ?></span>, Silahkan isi password baru anda.</h5>         
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
        </div>
    </div>