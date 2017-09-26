<?php

session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['login_button'])) {
// Email and password sent from form 
$email=$_POST['email'];
$password=md5($_POST['password']);


// Connect to server and select database.
	$connection = mysqli_connect("localhost", "root", "", "cms");

	// To protect MySQL injection for Security purpose
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, md5($_POST['password']));

	// Selecting Database
	$db = mysqli_select_db($connection, "cms");

	// SQL query to fetch information of registerd users and finds user match.	
	 $get_admin = "select * from admins WHERE email='$email' AND password='$password'";

	 $run_admin = mysqli_query($connection, $get_admin);

	 $rows = mysqli_num_rows($run_admin);

	if ($rows == 1) {

		$_SESSION['login_user']=$email; // Initializing Session

		$_SESSION['last_login_timestamp'] = time();//Store timestamp

		header("location: admin/index.php"); // Redirecting To Other Page
	}

	else {

		$error = "Email or Password is invalid";
	}

		mysqli_close($connection); // Closing Connection
	}

    // If result matched $email and $password, table must be 1 row


?>