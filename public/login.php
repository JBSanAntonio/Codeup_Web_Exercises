<?php

	session_start();

/*	Add a check to the login.php page to see if the user is logged in and then
 if they are, redirect to the authorized.php page instead of showing the login page
*/
	 function checklogin() {
	  return (isset($_SESSION['login'])) ? true : false;
	};

	if(checklogin() === true){
		header ("Location: authorize.php");
	} elseif(!empty($_POST)) {
		if ($_POST['username'] == 'guest' && $_POST['password'] == 'password') {
			$_SESSION['LOGGED_IN_USER']=$_POST['username'];
			header('location: authorized.php');
			exit();
		} else {
			echo "Login Failed"; 
		}
	} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
</head>
<body>
	<h1>Login with Username and Password</h1>

	 <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit">
    </form>
    
</body>
</html>


 	<!-- if (empty($_SESSION['login']) {
 		header ("Location: authorize.php")
 	} -->

 	<!-- if (isset($_SESSION['login']) && $_SESSION['login'] != '') {
	header ("Location: authorized.php"); -->


