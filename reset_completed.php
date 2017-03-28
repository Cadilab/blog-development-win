<?php

	session_start();

	require 'db.php';

	include_once('assets/language.php');
	include_once 'languages/'.$langfile;


	// Processing post and registering user
	include('assets/posts.php');


	$pageTitle = "MyBlog: Register";
    include('functions/functions.php');

    if(logged_in()) 
    {
        header("location: home");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>MyBlog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/blog/css/style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Font Awesome ikonice jbg ovo koristim -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>

<body>

<div class="home-header">
    <nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="/blog"><i class="fa fa-home"></i> <?php echo $lang['MENU_HOME']; ?></a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-list-ul"></i> Action
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/blog/login">Login</a></li>
                    <li><a href="/blog/register">Register</a></li>
                    <li><a href="/blog/password_reset">Reset password</a></li>                
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Language:
                    <span class="caret"></span></a>

                <ul class="dropdown-menu">
                  <li><a href="chlng.php?lang=english">English (US)</a></li>
                  <li><a href="chlng.php?lang=serbian">Srpski</a></li>
                  <li><a href="chlng.php?lang=croatian">Hrvatski</a></li>
                  <li><a href="chlng.php?lang=german">Deutsch</a></li>
                </ul>
              </li>        
          </ul>
      </div>
    </nav>
</div>


<div class="container">

<br>
<br>
<br>

<?php


    if(isset($_SESSION['message']))
    {
        echo '
              <br/><div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                ',$_SESSION['message'],'
              </div>
        ';
    }
    unset($_SESSION['message']);


?>

<?php

if(isset($_GET['token']) && isset($_GET['email']))
{
    $token = $_GET['token'];
    $email = $_GET['email'];

    $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email AND reset_token = :token LIMIT 1");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->rowCount() > 0)
    {
        echo '

        <form method="POST">

            <div class="row">
                <div class="col-sm-6">

                    <div id="frmCheckUsername">

                        <p>', $lang['RPW_COMPLETED'] ,'</p>

                        <div class="form-group">
                            <input type="password" class="demoInputBox" size="55" name="password" id="email" placeholder="', $lang['PH_PASSWORD'] ,'">
                        </div>

                        <div class="form-group">
                            <input type="password" class="demoInputBox" size="55" name="repassword" id="email" placeholder="', $lang['PH_REPASSWORD'] ,'">
                        </div>

                        <input type="submit" name="update_pwd_submit" class="btn btn-primary" value="', $lang['BUTTON_UPDATE'] ,'">
                    
                    </div>
                </div>
            </div>

        </form>    

        ';
    }
    else
    {
        header("location: password_reset");
        exit();       
    }
}
else
{
    header("location: password_reset");
    exit();
}

?>

</div>

</body>
</html>
