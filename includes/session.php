<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost","root","","cms");
// Selecting Database
$db = mysqli_select_db($connection,"cms");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$get_session = "select * from admins where email='$user_check'";
$run_session = mysqli_query($connection, $get_session);
$row = mysqli_fetch_assoc($run_session);
$login_session =$row['email'];
$user_names = $row['names'];
//Checking session time
if((time() - $_SESSION['last_login_timestamp']) > 600) // 600 sec = 10 min * 60 sec 
{  
	echo "<script>alert('Session Expired!')</script>";
    echo "<script>window.location='../includes/logout.php'</script>"; 
}  
else  
{  
    $_SESSION['last_login_timestamp'] = time();//Update session time  
}

if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>