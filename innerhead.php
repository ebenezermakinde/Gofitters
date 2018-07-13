<?php
session_start();
include('config.php');


//check if session ISset to give access to backend functionality.
//Otherwise, redirect the user to the homepage or login page.

if (!isset($_SESSION['_Toyin'])) {
    
    header("Location: signin.php");
}

 include('rbac.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <title>GoFitters<?php echo $title; ?></title>
    <!-- responsive css -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- meta tags for webcrawlers -->
    <meta name="description" content="This is the user profile home for GoFitters"/>
    <meta name="author" content="Ebenezer Makinde"/>
    <meta name="keyword" content="Teams, Clubs, Games, Management">
     <!-- logo icon -->
     <link rel="icon" type="image/png" sizes="16x16" href="icons/gofittersfav.png">
     <!-- Boostrap css -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
	<!--Gofitters css path -->
    <link rel="stylesheet" type="text/css" href="css/gofitters.css">
</head>
<style type="text/css">

        div{
            border: 0px solid black;
        }

        body{
            /*color:#02020B;*/
        }
        #homebg{

            background-color:
        }
        
        li{
            display: inline;
            padding: 10px;
           /* background-color: grey;*/
            color: black; 
        }

        li,a{
           /* background-color: green;*/
            color:#02020B;
        }

        a:hover{
            color: black;
            font-weight: bold;
            text-decoration: none;
        }

        ul{
            margin: 15px;
        }
        th{
           font-weight: bolder;
        }

        .headbg{

            background-color: #B33951;
            color:white;

        }

        #daytime{

            text-align: right;
        }

        p{
            font-weight: bold;
            font-size: 24px;
            color:;
        }

        #barwelcome{

            padding-top: 15px;

        }
    </style>


<body>
 
<div class="container-fluid" id="homebg" >
    <div class="row headbg">
        <div class="col-md-12">
           <div class="row">
        <div class="col-md-2">
            <h1>GoFitters</h1>
        </div>
        <div class="col-md-2">
          <img src="icons/gofittersfav.png" class="img-responsive">  
        </div>
        <div class="col-md-5" id="barwelcome">
           

             <div>
                 <form method="post">
                  <!-- <input type="text" name="search" placeholder="search here" class=" form-control search"> -->
              </form>

             </div>
        
        </div>
            <div class="col-md-3" id="daytime">
                Date: <?php echo date('dS F Y:h:i:s a'); ?>



            </div>

            

            </div> 
        </div>

        <div>
                <h4 style="font-weight: bolder; text-align: right; color: white; margin-right: 20px;">GoFitter! <?php echo $_SESSION['lstname']." ".$_SESSION['fstname']; ?>
                    you are logged in as <b><?php echo $_SESSION['rolename']; ?></b>
             </h4> 
             <div><a style="color: white" href="home.php">Return to Dashboard</a></div>
            </div>

    </div>


</div>
