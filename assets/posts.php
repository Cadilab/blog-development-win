 <?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['reg_submit']))
		{
			if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['repassword']))
			{
				if($_POST['password'] != $_POST['repassword'])
				{
					$_SESSION['message'] = $lang['PASSWORD_NOMATCH'];
					header("location: register");
					exit();					
				}
				else
				{
					$stmt = $connection->prepare("SELECT * FROM users WHERE email = :email OR username = :username");
					$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
					$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
					$stmt->execute();

					if($stmt->rowCount() > 0)
					{
						$_SESSION['message'] = $lang['ACCOUNT_EXISTS'];
						header("location: register");
						exit();
					}
					else
					{
						$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
						$username = ucfirst($_POST['username']);

						$stmt = $connection->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
						$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
						$stmt->bindParam(':username', $username, PDO::PARAM_STR);
						$stmt->bindParam(':password', $password, PDO::PARAM_STR);
						$stmt->execute();

						$_SESSION['logged_in'] = true;
						$_SESSION['username'] = $username;

						header("location: home");
					}
				}
			}
			else
			{
				$_SESSION['message'] = $lang['FIELDS_REQUIRED'];
				header("location: register");
				exit();				
			}
		}
		elseif (isset($_POST['login_submit']))
		{
			if(!empty($_POST['username']) && !empty($_POST['password']))
			{
				$post_autologin = $_POST['autologin'];

				$stmt = $connection->prepare("SELECT * FROM users WHERE username = :username");
				$stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
				$stmt->execute();

				if($stmt->rowCount() > 0)
				{
					$row = $stmt->fetch(PDO::FETCH_ASSOC);

					$password = $_POST['password'];
					if(password_verify($password, $row['password']))
					{	
						$_SESSION['logged_in'] = true;
						$_SESSION['username'] = $row['username'];
						$_SESSION['avatar'] = $row['avatar'];

						if($post_autologin == 1) 
						{
							$length = 32;
							$token = bin2hex(random_bytes($length));

							setcookie("RememberMe", $token, time()+3600*24*365);

							$check = $connection->prepare("UPDATE users SET remember_token = :token WHERE username = :username");
							$check->bindParam(':token', $token, PDO::PARAM_STR);
							$check->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
							$check->execute();													
						}

						header("location: home");
						exit();
					}	
					else
					{
						$_SESSION['message'] = $lang['INVALID_CREDENTIALS'];
						header("location: login");
						exit();
					}
				}
				else
				{
					$_SESSION['message'] = $lang['INVALID_CREDENTIALS'];
					header("location: login");
					exit();
				}
			}
		}
		elseif (isset($_POST['reset_pwd_submit']))
		{
			if(!empty($_POST['email']))
			{
				$stmt = $connection->prepare("SELECT * FROM users WHERE email = :email");
				$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
				$stmt->execute();

				if($stmt->rowCount() > 0)
				{
					$length = 78;
					$token = bin2hex(random_bytes($length));

					$stmt = $connection->prepare("UPDATE users SET reset_token = :token, reset_created = NOW() WHERE email = :email");
					$stmt->bindParam(':token', $token, PDO::PARAM_STR);
					$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
					$stmt->execute();

					$_SESSION['message'] = $lang['RESET_COMPLETED'];

				}
				else
				{
					$_SESSION['message'] = $lang['INVALID_CREDENTIALS'];
					header("location: password_reset");
					exit();
				}
			}
		}
		elseif (isset($_POST['update_pwd_submit']))
		{
			if(!empty($_POST['password']) && !empty($_POST['repassword']))
			{
				if($_POST['password'] != $_POST['repassword'])
				{
					$_SESSION['message'] = $lang['PASSWORD_NOMATCH'];
					header('Location: ' . $_SERVER['HTTP_REFERER']);
					exit();					
				}
				else
				{
					$length = 78;
					$token = bin2hex(random_bytes($length));

					$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

					$stmt = $connection->prepare("UPDATE users SET password = :password, reset_token = :token WHERE email = :email");
					$stmt->bindParam(':password', $password, PDO::PARAM_STR);
					$stmt->bindParam(':token', $token, PDO::PARAM_STR);
					$stmt->bindParam(':email', $_GET['email'], PDO::PARAM_STR);
					$stmt->execute();

					header("location: home");
					exit();
				}				
			}
		}
	}

 ?>