
	<div class="signup-form">
	    <form action="<?=base_url('login/registerAction')?>" method="POST">
			<h2>Register</h2>
			<p class="hint-text">Create your account. It's free and only takes a minute.</p>
			<?php 
				if($this->session->flashdata('register')) {
                    echo $this->session->flashdata('register');
               	}
               	echo validation_errors();
            ?>  

	        <div class="form-group">
				<div class="row">
					<div class="col-xs-6"><input type="text" class="form-control" name="fname" placeholder="First Name" required="required"></div>
					<div class="col-xs-6"><input type="text" class="form-control" name="lname" placeholder="Last Name" required="required"></div>
				</div>        	
	        </div>
	        <div class="form-group">
	        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
	        </div>
	        <div class="form-group">
	        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
	        </div>
			<div class="form-group">
	            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
	        </div>
			<div class="form-group">
	            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
	        </div>   
	        <div><small id="notice"></small></div>     
	        <div class="form-group">
				<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
			</div>
			<div class="form-group">
	            <button type="submit" class="btn btn-primary btn-lg btn-block">Register Now</button>
	        </div>
	    </form>
		<div class="text-center">Already have an account? <a href="<?=base_url('login')?>">Sign in</a></div>
	</div>