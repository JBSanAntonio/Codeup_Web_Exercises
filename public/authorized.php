<?php
	session_start();

	/*Add a check to the authorized.php page to redirect to the login.php page if a user is not logged in. If they are, display their username after the authorized message.*/

	if(!(isset($_SESSION['LOGGED_IN_USER']))){
		header ("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>POST Example Authorized</title>
</head>
<body>
	
	<h1>User is authorized</h1>
	<h2>Username is: <?= $_SESSION['LOGGED_IN_USER'] ?></h2>
<!-- Add link to authorized.php page that goes to logout.php.-->
	
</body>
</html>