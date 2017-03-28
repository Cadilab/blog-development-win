<?php

require 'db.php';

if(isset($_POST['username']) && !empty($_POST['username']) && strlen(trim($_POST['username'])) != 0)
{
	$stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
	$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
	$stmt->execute();

	if($stmt->rowCount() > 0)
	{
		echo "<span class='status-not-available'>Not Available.</span>";
	}
	else
	{
		echo "<span class='status-available'>Available.</span>";
	}
}

if(isset($_POST['email']) && !empty($_POST['email']) && strlen(trim($_POST['email'])) != 0)
{
	$email = $_POST["email"];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		echo "<span class='status-not-available'>Invalid format.</span>";
	}
	else
	{
		$stmt = $connection->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
		$stmt->execute();

		if($stmt->rowCount() > 0)
		{
			echo "<span class='status-not-available'>Not Available.</span>";
		}
		else
		{
			echo "<span class='status-available'>Available.</span>";
		}
	}
}

?>