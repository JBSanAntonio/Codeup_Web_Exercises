
<!-- perform a logout when that page is accessed, and then redirect to the login page.
 -->

<?php

session_start();

    // end the current session
    endSession();
    header('location: login.php');
    exit();

	function endSession() {
		if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }
	 session_destroy();
}
?>