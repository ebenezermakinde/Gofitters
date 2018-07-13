<?php 
include('config.php');
include('gofittersfunctions.php');

   //Then, select/fetch all group_members table info and display it in HTML TABLE for trainer and superAdmin Approval.
	$query = "SELECT group_members.*,profiles.lastname,profiles.firstname,seasons.seasonimage,seasons.seasonName FROM group_members INNER JOIN profiles ON group_members.profileId = profiles.profileId";

	$result = mysqli_query($con,$query);

 ?>
