<?php

//Set validation error variable to false
$error = false;

//Check if form is submitted
if (isset($_POST['submit'])){
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	$data = file_get_contents($_FILES["image"]["tmp_name"]);
    $encoded_data = base64_encode($data);
    $animals = mysqli_real_escape_string($conn, $_POST['animal']);

	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = "Name must contain only alphabets and space";

	}
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please enter a valid email";
	}
	if (strlen($password)<6) {
		$error = true;
		$password_error = "Password must contain more than 6 characters";
	}
	if ($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password does not match";
	}
	if (!$error) {
		if (mysqli_query($conn, "INSERT INTO user(name, email, password, images, type_of_animal) 
			VALUES ('". $name . "', '". $email . "', '". md5($password) . "', '".$encoded_data."', '".$animals."')")) {
			$success_msg = "Successfully registered! <a href='login.php'>Click here to Login </a>";
		}
		else{
			$error_msg = "Error in registering...Please try again later";
		}
	}
}