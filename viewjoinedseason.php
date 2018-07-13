<?php 
include ('config.php'); 
$getprofileid = $_GET['getprofileid'];
$getseasonid = $_GET['getseasonid'];

// var_dump($_GET);

//step 1: insert data into the member group table
if(!empty($getprofileid)){
$sql = "INSERT INTO group_members(profileId,seasonId,member_status) 
		VALUES('$getprofileid','$getseasonid','pending')";

if(!mysqli_query($con,$sql)){
	echo("Error description: ".mysqli_error($con));

//step 2: display whatever is in group_members table
	}else{

	echo "<div class='alert alert-success'>Your request to join this season is pending approval from the trainer</div>";

     } //end of conditional statement	

}
