
    <div class="container">
            <div class="login-form">
                <form action="<?=base_url('login')?>" method="POST">
                    <h2 class="text-center">Log in</h2> 
                    <?php 
                        if($this->session->flashdata('status')) {
                            echo $this->session->flashdata('status');
                        }
                    ?>      
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log in</button>
                    </div>
                    <div class="clearfix">
                        <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                        <a href="<?=base_url('login/forgot')?>" class="pull-right">Forgot Password?</a>
                    </div>        
                </form>
            <p class="text-center"><a href="<?=base_url('login/register')?>">Create an Account</a></p>
        </div>
    </div>


             