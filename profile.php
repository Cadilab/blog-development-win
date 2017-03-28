<?php

	session_start();

	require 'db.php';

	include_once('assets/language.php');
	include_once 'languages/'.$langfile;


	// Processing post and registering user
	include('assets/posts.php');

	$pageTitle = ucfirst($_GET['id']);
    include('functions/functions.php');
	include('assets/header.php');

    if(!logged_in()) 
    {
        header("location: home");
        exit();
    }

	if(isset($_GET['id']))
	{
		$urlparts = parse_url($_SERVER['REQUEST_URI']);
		$path = explode('/', $urlparts['path']);
		$username = ucfirst($path[2]);

		$stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();

		if($stmt->rowCount() > 0)
		{
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			if($row['username'] == $_SESSION['username'])
			{
				include('assets/content/view_profile_owner.php');
			}
			else
			{
				include('assets/content/view_profile_visitor.php');	
			}
		}
		else
		{
			header("location: home");
			exit();			
		}
	} 
	else
	{
		header("location: home");
		exit();
	}

?>