<?php

session_start();

if(isset($_GET['lang']))
{
	switch($_GET['lang'])
	{
		case 'english':
		$_SESSION['lang'] = 'en.us';
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();	
		break;

		case 'serbian':
		$_SESSION['lang'] = 'sr.rs';

		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();	

		break;	

		case 'german':
		$_SESSION['lang'] = 'de.ge';

		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit();	

		break;			
	}
}
else
{
	$_SESSION['lang'] = 'en.us'; 
}

?>