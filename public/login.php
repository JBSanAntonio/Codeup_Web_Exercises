<?php

	if (!empty($_POST)) {
		if ($_POST['username'] == 'guest' && $_POST['password'] == 'password') {
			header('location: authorized.php');
			exit();
		} else {
			echo "Login Failed";
		} 
	};
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




