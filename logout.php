<?php
session_start();
session_destroy();//Destroy all session variables

//redirect to index.php/login page

header("Location: http://localhost/gofitters/signin.php");

?>