<?php

	session_start();

	require 'db.php';

	include_once('assets/language.php');
	include_once 'languages/'.$langfile;


	// Processing post and registering user
	include('assets/posts.php');
	include('functions/functions.php');

	$pageTitle = "MyBlog: Welcome";

	include('assets/header.php');

?>


<?php 

	if(!logged_in())
	{
		include('assets/content/logged_out.php');
	}
	elseif (logged_in())
	{
		include('assets/content/logged_in.php');
	}

?>

</body>
</html>