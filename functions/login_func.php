<?php
include 'db/connect.php';

	//Check if form is submitted
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	
	$result = mysqli_query($conn, "SELECT * FROM user WHERE email = '". $email ."' AND password = '". md5($password) ."' ");
	var_dump($result);
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header('Location: account.php');
	}
	else{
		$msg_error = "Incorrect Email or Password";
	}
	}
