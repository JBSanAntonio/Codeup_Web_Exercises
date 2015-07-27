
<!-- perform a logout when that page is accessed, and then redirect to the login page.
 -->

<?php
require_once '../Auth.php';
require_once '../Input.php';

session_start();

Auth::logout();

    
?>