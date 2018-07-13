<?php

$title = "| Delete Users"; //must be at the top.
include('innerhead.php'); 

$myprofileid = $_GET['id'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];

if (isset($_POST['deleter']) && $_POST['deleter']=='Delete User' && $_POST['deleteuser']=='yes') {

$profileid = $_POST['profileid'];
//delete users details from database
$sql = "DELETE FROM profiles WHERE profileId='$profileid'";

if(mysqli_query($con,$sql)){

	$output = mysqli_affected_rows($con)." record was deleted successfully!";

	header("Location: http://localhost/gofitters/listusers.php?success=$output");

  }
}

var_dump($_POST);

?>

<h4>Deleting User's Records</h4>
<div>
<span class="alert alert-warning">You are about to delete this user</span>
</div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="radio" name="deleteuser" value="yes">Yes <br/>
		<input type="radio" name="deleteuser" value="no">No <br/>
		<input type="hidden" name="profileid" value="<?php echo $myprofileid; ?>">
		<input type="submit" name="deleter" value="Delete User">

</form>


<?php include('innerfoot.php');  ?>