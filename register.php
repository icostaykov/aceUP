<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include 'db/connect.php';
if (isset($_SESSION['usr_id'])) {
	header("Location: index.php");
}
include 'functions/register_func.php';
?>
<?php
include 'views/head.php';
include 'views/navigation.php';
include 'views/header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 ">
			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="reg_form" enctype="multipart/form-data">
				<fieldset>
					<legend>Sign Up</legend>
					<hr>
					  <div class="form-group">
					    <label for="name" class="login-form">Name</label>
					    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Full Name" required value="<?php if($error)
					    	echo $name;
					     ?>" />
					     <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
					  </div>

					  <div class="form-group">
					    <label for="name" class="login-form">Email</label>
					    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required value="<?php 
					    	if ($error) 
					    	echo $email;
					    ?>"/>
					     <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					  </div>

					  <div class="form-group">
					    <label for="name" class="login-form">Password</label>
					    <input type="password" class="form-control" name="password" id= "password" placeholder="Password" required value="<?php 
					    	if($error)
					    	echo $password;
					    ?>"/>
					    <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					  </div>

					  <div class="form-group">
					    <label for="name" class="login-form">Confirm Password</label>
					    <input type="password" class="form-control" name="cpassword" id= "cpassword" placeholder="Confirm Password"/>
					    <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					  </div>
 					  <div class="form-group">
					    <label for="name" class="login-form">Confirm Password</label>
					    <input type="file" class="form-control" name="photo" id= "photo" />
					    <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					  </div>
 					  <div class="form-group">
                        <input type="submit" name="submit" value="Sign Up" class="btn btn-primary" />
                      </div>				
                </fieldset>
			</form>
			<span class="text-success">
				<?php 
				if (isset($success_msg)) {
					echo $success_msg;
					}
				?>
			</span>
			<span class="text-danger">
				<?php 
				if (isset($error_msg)) {
					echo $error_msg;
					}
				?>
			</span>
		</div>
	</div>
</div>
</body>
</html>