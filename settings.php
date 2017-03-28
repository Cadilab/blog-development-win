<?php

	session_start();

	require 'db.php';

	include_once('assets/language.php');
	include_once 'languages/'.$langfile;


	// Processing post and registering user
	include('assets/posts.php');

	$pageTitle = "Settings";
    include('functions/functions.php');
	include('assets/header.php');

    if(!logged_in()) 
    {
        header("location: home");
        exit();
    }

?>    