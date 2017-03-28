<?php


session_start();
include ('functions/functions.php');

$_SESSION['logged_in'] = false;
unset($_SESSION['logged_in']);

if(!logged_in())
{
	echo "User is logged in!";
}

?>