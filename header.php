<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>GoFitters<?php echo $title;?></title>

	<!-- meta tags for webcrawlers -->
    <meta name="keywords" content="Teams, Clubs, Games, Management"/>
    <meta name="description" content="This is a web application to manage team events"/>
    <meta name="author" content="Ebenezer Makinde"/>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta charset="utf-8">
    <!-- logo icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="icons/gofittersfav.png">
    <!-- responsive css -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Boostrap css -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
	<!--Gofitters css path -->
	<link rel="stylesheet" type="text/css" href="css/gofitters.css">
  <!-- Gofitters js path -->
  <script type="text/javascript" src="js/gofitters.js"></script>

</head>
<body>
	<!-- This the menu bar section -->
	<nav class="navbar navbar-inverse navbarcolor">
  <div class="container-fluid ">
    <div class="navbar-header ">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" style="color: #FF200E" href="index.php"><b>GoFitters</b>
        <img src="icons/gofittersfav.png" width="30px" height="30px" class="img-responsive" style="display: inline;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php" class="navmenu active" id="homemenu">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">About GoFitters<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="#">Fun & Exercise</a></li>
            <li><a href="termsofuse.php">Terms of Use</a></li>
          </ul>
        </li>
        <li><a href="teams.php" class="navmenu" id="teammenu">Teams</a></li>
        <li><a href="plans.php" class="navmenu" id="plansmenu">Plans</a></li>
        <li><a href="help.php" class="navmenu" id="helpmenu">Help & Support</a></li>
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php" class="navmenu" id="signmenu"><span class="glyphicon glyphicon-user"></span> SignUp for Free</a></li>
        <li><a href="signin.php" class="navmenu" id="loginmenu"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>