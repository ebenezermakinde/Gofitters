<?php 
session_start();
include('config.php'); 
$getprofileid = $_GET['profileid'];
$getseasonid = $_GET['seasonid'];
$getsurveytext = $_GET['surveytext'];



// var_dump($_GET);

$profileid = $_SESSION['profileId'];




// $profileid = $_POST['profilesid'];

 if(empty($getprofileid)){

 	$err1 = "Profile ID field cannot be empty";
 }

 if(empty($getseasonid)){

 	$err2 = "Season ID field cannot be empty";
 }

 if($err1 =="" && $err1 ==""){
	 //step 1: insert data into the survey table
	 $surveysql = "INSERT INTO surveys(profileId,seasonId,surveytext)
 		VALUE('$getprofileid','$getseasonid','$getsurveytext')";

 		// var_dump($surveysql);

 	if(!mysqli_query($con,$surveysql)){
	echo("Error description: ".mysqli_error($con));

//step 2: Display whatever is in survey table
}else{

	echo "<div class='text-success'>A new survey has been added successfully</div>";

     } //end of conditional statement	

 }

 	//Then, select/fetch all survey table info and display it in HTML TABLE
	$surveyquery = "SELECT surveys.*,profiles.lastname,profiles.firstname 
	FROM surveys INNER JOIN profiles ON surveys.profileId = profiles.profileId INNER JOIN
	seasons ON surveys.seasonId = seasons.seasonId WHERE profiles.profileId = '$profileid'";

			// var_dump($resultquery);
	$resultquery = mysqli_query($con,$surveyquery);

		// var_dump($resultquery);

?>

	
	<table class="table table-bordered table-striped table-hover">
 	<tr>
 		<th>Survey ID</th>
 		<th>Profile ID</th>
 		<th>Season ID</th>
 		<th>Survey Text</th>
 		<th>Creation Date</th>
 		<th>Trainer</th>
 		<th>Action</th>
 	</tr>

 		<?php
	//display the result in table row
	while($row = mysqli_fetch_assoc($resultquery)){
 	?>
 	<tr>
	 	<td><?php echo $row['surveyId']; ?></td>
	 	<td><?php echo $row['profileId']; ?></td>
	 	<td><?php echo $row['seasonId']; ?></td>
	 	<td><?php echo $row['surveytext']; ?></td>
	 	<td><?php echo date('dS F, Y', strtotime($row['survey_createdDate']));?></td>
	 	<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
	 	<td>
	 		<form method="post" action="">
 			<input type="hidden" name="profileid" id="profileid" value="<?php echo $_SESSION['profileId'];?>">
 			<input type="submit" name="submit" id="submit" value="Edit" class="btn btn-sm btn-primary">
 			<input type="submit" name="submit" id="submit" value="Delete" class="btn btn-sm btn-primary">
 		   </form>

	 	</td>
 	</tr>



 <?php

 	} //end of loop
 	
 session_write_close();
 ?>

  </table>