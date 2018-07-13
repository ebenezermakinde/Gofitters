<?php
include('innerhead.php');
include('config.php');

$profileId = $_SESSION['profileId'];
// echo "<pre>";
//   print_r($profileId);
//   echo "</pre>";
 

//Then, select/fetch all group_members table info and display it in HTML TABLE for trainer and superAdmin Approval.
	$query = "SELECT seasons.*,group_members.member_status,group_members.dateJoined,group_members.memberId,profiles.lastname,profiles.firstname FROM seasons INNER JOIN group_members ON group_members.seasonId = seasons.seasonId INNER JOIN  profiles ON profiles.profileId = group_members.profileId WHERE seasons.profileId = '$profileId' AND group_members.member_status in ('pending','terminated')";

	$result = mysqli_query($con,$query);


?>

<div class="container">
  <h1 style="text-align: center;">Members Request to Join A Season</h1>
<div class="row">
	<div class="col-md-12">

    <?php
     if(isset($_GET['success'])){
      echo "<div class=alert alert-success> ".$_GET['success']." </div>";

     }
     ?>
<table class="table table-bordered table-striped table-hover">
 	<tr>
 		
 		<th>Profile ID</th>
 		<th>Date Joined</th>
 		<th>Season ID</th>
 		<th>Member Status</th>
 		<th>Member Name</th>
 		<th>Season Name</th>
 		<th>Action</th>

 	</tr>
	<?php
	//display the result in table row
	while($row = mysqli_fetch_assoc($result)){
		// var_dump($row);
 	?>
<tr>
 	<td><?php echo $row['profileId']; ?></td>
 	<td><?php echo date('F j, Y, g:i a', strtotime($row['dateJoined']));?></td>
 	<td><?php echo $row['seasonId']; ?></td>
 	<td><?php echo $row['member_status']; ?></td>
 	<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
 	<td><?php echo $row['seasonName']; ?></td>
 	<td>
 		<form method="post" action="">
 			<input type="hidden" name="memberid" id="memberid" value="<?php echo $row['memberId']; ?>">
      <input type="hidden" name="lastname" id="lstname" value="<?php echo $row['lstname']; ?>">
 			<input type="hidden" name="firstname" id="fstname" value="<?php echo $row['fstname']; ?>">
 			<input type="hidden" name="seasonId" id="seasonid" value="<?php echo $row['seasonid']; ?>">
      <input type="hidden" name="profileid" id="profileid" value="<?php echo $row['profileId']; ?>">
 			<!-- <input type="submit" name="submit" id="submit" value="Update Status" class="btn btn-sm btn-primary"> -->
 			<!-- <input type="button" name="submit" id="submit" value="Reject" class="btn btn-sm btn-primary"> -->
 		</form>
 		<a class="text-primary" href="approveseason.php?id=<?php echo $row['memberId'];?>">Update Status</a>
 	</td>
</tr>


 <?php

 	} //end of loop
 	
 ?>

  </table>	
		</div>
  	</div>


    <?php 

    //Then, select/fetch all group_members table info and display it in HTML TABLE for trainer and superAdmin Approval.
  $approvedquery = "SELECT seasons.*,group_members.member_status,group_members.dateJoined,group_members.memberId,profiles.lastname,profiles.firstname FROM seasons INNER JOIN group_members ON group_members.seasonId = seasons.seasonId INNER JOIN  profiles ON profiles.profileId = group_members.profileId WHERE seasons.profileId = '$profileId' AND group_members.member_status in ('approved') ";

  $resultapprove = mysqli_query($con,$approvedquery);


     ?>


  		<div class="row">
  			 <h1 style="text-align: center;">Approved Members</h1>
  			<div class="col-md-12">
  				<table class="table table-bordered table-striped table-hover">
          <tr>        
            <th>Profile ID</th>
            <th>Date Joined</th>
            <th>Season ID</th>
            <th>Member Status</th>
            <th>Member Name</th>
            <th>Season Name</th>
          </tr>
          <?php
          //display the result in table row
          while($row = mysqli_fetch_assoc($resultapprove)){
            // var_dump($row);
          ?>
        <tr>
          <td><?php echo $row['profileId']; ?></td>
          <td><?php echo date('F j, Y, g:i a', strtotime($row['dateJoined']));?></td>
          <td><?php echo $row['seasonId']; ?></td>
          <td><?php echo $row['member_status']; ?></td>
          <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
          <td><?php echo $row['seasonName']; ?></td>
        </tr>

             <?php

        } //end of loop
  
        ?>


      </table>


          </div>

    </div>
</div>
    
    
      
  <?php include('innerfoot.php') ?>

  