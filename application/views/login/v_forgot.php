    <div class="container">
            <div class="login-form">
                <form action="<?=base_url('login/forgot')?>" method="POST">
                    <h2 class="text-center">Forgot Password</h2> 
                    <p><em><small>Lupa Password? Silahkan isi form di bawah ini lalu submit. Lalu cek email anda untuk tautan reset password.</small></em></p>
                    <br>
                    <?php 
                        if($this->session->flashdata('forgot')) {
                            echo $this->session->flashdata('forgot');
                        }
                    ?>      
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>        
                </form>
        </div>
    </div>
