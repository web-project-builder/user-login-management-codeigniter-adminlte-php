<body class="hold-transition login-page">
	<div class="login-box">
	  	<div class="login-logo">
	    	<a href="<?php echo base_url(); ?>"><b>User Login and Management</b></a>
	  	</div>
	  	<!-- /.login-logo -->
	  	<div class="login-box-body">
	    	<p class="login-box-msg">Sign in to start your session</p>
			<?php if($this->session->flashdata("messagePr")){?>
	  		<div class="alert alert-info">      
		        <?php echo $this->session->flashdata("messagePr")?>
		    </div>
		    <?php } ?>
		    <form action="<?php echo base_url().'user/auth_user'; ?>" method="post">
		    	<div class="form-group has-feedback">
		    		<input type="text" name="email" class="form-control" id="" placeholder="Email">
		        	<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		      	</div>
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" id="pwd" placeholder="Password" >
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
			    <a href="forgetpassword" class="forgot ">I Forgot my password?</a>
			  	<div class="row">
			  		<div class="col-xs-12">
		          		<button type="submit" class="btn btn-primary btn-block btn-flat btn-color">Sign In</button>
		        	</div>
				</div>
		    </form>
		    <!-- /.social-auth-links -->
		    <?php if(setting_all('register_allowed')==1){ ?>
		    	<br>
				<span class="glyphicon glyphicon-user bg-icon-paste"></span><a href="<?php echo base_url().'user/registration';?>" class="text-center"> Register a new membership</a>
			<?php } ?>
		</div>
		<!-- /.login-box-body -->
	</div>
</body>
