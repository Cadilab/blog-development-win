<?php

	if(isset($_SESSION['lang']))
	{
		$lang = $_SESSION['lang'];
		switch($lang)
		{
			case 'en.us':
			$langfile = 'en.us.lang.php';
			break;

			case 'sr.rs':
			$langfile = 'serbian.lang.php';
			break;

			case 'de.ge':
			$langfile = 'de.lang.php';
			break;			
		}
	}
	else
	{
		$_SESSION['lang'] = 'en.us';
		$langfile = 'en.us.lang.php';
	}

?>