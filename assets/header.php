<!DOCTYPE html>
<html>
<head>

	<title><?php echo $pageTitle; ?></title>
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

    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="/blog"><i class="glyphicon glyphicon-home"></i> <?php echo $lang['MENU_HOME']; ?></a></li>

            <?php


            if(!logged_in())
            {
              echo '
                    <li><a href="#"><i class="fa fa-users"></i>  ', $lang['MENU_ABOUT'],'</a></li>';
            }
            else
            {
              echo '
                    <li><a href="#"><i class="glyphicon glyphicon-inbox"></i>  ', $lang['MENU_MESSAGES'],'</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-heart"></i>  ', $lang['MENU_NOTIFICATIONS'],'</a></li>';              
            }

            ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">

        <?php
          if(!logged_in())
          {
            echo 
            '
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
              ';            
              }
              else
              {
              echo 
              '
              <li class="dropdown">
              <img data-toggle="dropdown" class="circle" height="40" width="40" src="/blog/uploads/',$_SESSION['avatar'],'">

              <ul class="dropdown-menu">
              <li><a href="/blog/', $_SESSION['username'] ,'">', $lang['MENU_ACCOUNT'] ,'</a></li>
              <li><a href="/blog/settings">', $lang['MENU_SETTINGS'] ,'</a></li>
              <li><a href="/blog/logout">', $lang['MENU_LOGOUT'] ,'</a></li>
              </ul>
              </li>

            ';
          }
        ?>

        </ul>
      </div>
    </nav>

