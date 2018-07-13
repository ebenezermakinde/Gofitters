<?php
session_start();
include ('config.php'); 
$getseasonname = $_GET['getseasonname'];
$getseasonimage = $_GET['getseasonimage'];
$getconfirmdate = $_GET['getconfirmdate'];
$getseasonprice = $_GET['getseasonprice'];

$profileid = $_SESSION['profileId'];
// var_dump($profileid);
// var_dump($_SESSION);

if(!empty($getseasonimage)){
$sql = "INSERT INTO seasons(seasonName,seasonimage,confirmDate,seasonPrice) 
		VALUES('$getseasonname','$getseasonimage','$getconfirmdate','$getseasonprice')";

if(!mysqli_query($con,$sql)){
	echo("Error description: ".mysqli_error($con));
	}else{

	echo "<div class='text-success'>A new thread has been added successfully</div>";

     } //end of conditional statement	

}

	$query = "SELECT seasons.*, profiles.lastname,profiles.firstname FROM seasons 
			  INNER JOIN profiles ON profiles.profileID = seasons.profileID WHERE seasons.profileId = '$profileid' ORDER BY seasonId DESC ";

	$result = mysqli_query($con,$query);

?>

<table class="table table-bordered table-striped table-hover">
 	<tr>
 		<th>Season Id</th>
 		<th>Season Name</th>
 		<th>Season Image</th>
 		<th>Confirmed Date</th>
 		<th>Season Price</th>
 		<th>Date Created</th>
 		<th>Trainer</th>
 		<th>Action</th>

 	</tr>
	<?php
	//display the result in table row
	while($row = mysqli_fetch_assoc($result)){
 	?>
<tr>
 	<td><?php echo $row['seasonId']; ?></td>
 	<td><?php echo $row['seasonName']; ?></td>
 	<td><?php echo $row['seasonimage']; ?></td>
  	<td><?php echo date('dS F, Y', strtotime($row['confirmedDate']));?></td>
 	<td><?php echo $row['seasonPrice']; ?></td>
 	<td><?php echo date('dS F, Y', strtotime($row['datecreated']));?></td>
 	<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
 	<td>
 		<form method="post" action="jointeams.php">
 			<input type="hidden" name="profileid" id="profileid" value="<?php echo $row['profileId']; ?>">
 			<input type="hidden" name="threadname" id="threadname" value="<?php echo $row['title']; ?>">
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