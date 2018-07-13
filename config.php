<?php
$con = mysqli_connect("localhost","root","Lcmanager","gofitters"); //A function that opens  DB connection for GoFitters to MYSQL server.

//Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MYSQL ".mysqli_connect_errno();
	}
	date_default_timezone_set('Africa/Lagos');
 error_reporting(0);
?>