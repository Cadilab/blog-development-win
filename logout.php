<?php

	setcookie("RememberMe", "", time()-3600*24*365, "/");
	
	session_start();
	session_unset();
	session_destroy();

	ob_start();
	header("location: home");
	ob_end_flush(); 
	exit();

?>