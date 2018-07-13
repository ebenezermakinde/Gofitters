<?php

$title = "| Survey Response"; //must be at the top.
include('innerhead.php'); 

$profileid = $_SESSION['profileId'];
$myresponse = $_POST['userresponse'];
$theseason = $_POST['seasonname'];
$surveyid = $_POST['surveyid'];

// var_dump($surveyid);

if (isset($_POST['respond']) && $_POST['respond']=='Respond' && $_POST['userresponse']=='Y' || $_POST['userresponse']=='N' ) {

$profileid = $_POST['profileid'];
//Insert users response into the user_response table
$ressql = "INSERT INTO user_response(profileId,surveyId,user_resp_response)
VALUES('$profileid','$surveyid','$myresponse')";

var_dump($ressql);

if(mysqli_query($con,$ressql)){

	$output ="Dear $lstname $fstname your response has been sent to your trainer!";

	header("Location: http://localhost/gofitters/home.php?success=$output");

  }
}

// var_dump($_POST);

$sqlsurvey = "SELECT group_members.*,seasons.seasonId,surveys.seasonId FROM group_members INNER JOIN seasons ON
			group_members.seasonId = seasons.seasonId INNER JOIN surveys 
			ON surveys.seasonId = seasons.seasonId WHERE group_members.profileId = '$profileid' AND group_members.member_status = 'approved'";
$resultquery = mysqli_query($con,$sqlsurvey);

// var_dump($sqlsurvey);

//check for errors
if(!mysqli_query($con, $sqlsurvey)) {
  echo "Error: ".mysqli_error($con);
  }

  $details = mysqli_fetch_assoc($resultquery);

// echo '<pre>';
//  var_dump($details);
//  echo '</pre>'

?>


<h4>My Survey Response</h4>
<div>
<span class="text-primary">You are about to respond to <?php echo $theseason ?> survey </span>
</div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="radio" name="userresponse" value="Y">Yes <br/>
		<input type="radio" name="userresponse" value="N">No <br/>
		<input type="hidden" name="profileid" value="<?php echo $profileid; ?>">
		<input type="hidden" name="surveyid" value="<?php echo $_POST['surveyid']; ?>">
		<input type="submit" name="respond" value="Respond">

</form>

<?php include('innerfoot.php');  ?>