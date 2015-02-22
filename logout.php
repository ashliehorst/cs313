<?php
// the problem was that "this page did not have access to the session"
if(!$_SESSION){
	session_start();
}
	session_destroy();
	header("Location: ../login.php");
	exit;


?>
