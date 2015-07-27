<?php
	require_once '../Auth.php';
	require_once '../Input.php';

	session_start();
		
/*check to see if user logged in, if logged in then send to authorized page*/
	if(!Auth::check()){	
		header ("Location: authorized.php");
		exit();
	}

	/*if user is not logged in, then take in username and password*/
	if(Input::has('password') && Input::has('username')) {
		$username=Input::get('username');
		$password=Input::get('password');

	/*if username & password are valid, then send user to authorized page*/
		if(Auth::attempt($username, $password)) {
			header('Location"/authorized.php');
			exit();
		}
	} 	
	} elseif (Auth::attempt($username,$password)){
			header('location: authorized.php');
			exit();	
	} else {
/*	If either the username or password are incorrect then log an error: 
"User $username failed to log in!".*/
			echo "User $username failed to log in!"; 
		}	
?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example</title>
    <link rel="stylesheet" href="css/loginPHP.css">
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


 	


