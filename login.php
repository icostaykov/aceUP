<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_SESSION['usr_id'])!= "") {
	header('Location: index.php');
}
include 'functions/login_func.php';
?>
<?php
include 'db/connect.php';
include 'views/head.php';
include 'views/navigation.php';
include 'views/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 ">
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="login_form">
				<fieldset>
					<legend>Login</legend>
					<hr>
					  <div class="form-group">
					    <label for="name" class="login-form">Email</label>
					    <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" />
					  </div>

					  <div class="form-group">
					    <label for="name" class="login-form">Password</label>
					    <input type="password" class="form-control" name="password" id= "password" placeholder=" Your Password" />
					  </div>
 					  
 					  <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-primary" />
                      </div>				
                </fieldset>
                <span class="text-danger">
				<?php 
				if (isset($msg_error)) {
					echo $msg_error;
					}
				?>
			</span>
			</form>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 ">
			<p> New User? <a href="register.php"> Sign Up Here </a> </p>
		</div>	
	</div>
</div>
<?php 

include 'views/footer.php';
?>
