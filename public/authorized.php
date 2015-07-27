<?php
	session_start();

	require_once '../Auth.php';
	require_once '../Input.php';
	require_once '../log.php';

	session_start();

	/*Add a check to the authorized.php page to redirect to the login.php page if a user is not logged in. If they are, display their username after the authorized message.*/
	if(!Auth::check()){	
		header ("Location:/login.php");
	} else {
		Log::logMessage('INFO', 'this info message is working');
	}

?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example Authorized</title>
</head>
<body>
<!-- Use the Log class to log an info message: "User $username logged in."-->
	<h1>User is authorized and logged in</h1>
	<h2>User <?= $username?> . logged in.></h2>

	<!-- Add link to authorized.php page that goes to logout.php.-->
	<a href="logout.php">Logout</a>

</body>
</html>