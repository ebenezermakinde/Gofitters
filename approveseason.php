<?php 
include('innerhead.php');
include ('gofittersfunctions.php');
 ?>


<?php  
 if (isset($_POST['submit']) && $_POST['submit']=='Update') {

 			$lastname = gofitters_input($_POST['lastname']);
 			$firstname = gofitters_input($_POST['firstname']);
            $seasonname = gofitters_input($_POST['seasonname']);
            $memberstatus = gofitters_input($_POST['memberstatus']);
            $memberid = gofitters_input($_POST['memberid']);
            
            //validate lastname
            if (empty($lastname)) {
                $err1 = "Last name field cannot be empty";
            }

            //validate firstname
            if (empty($firstname)) {
                $err2 = "First name field cannot be empty";
            }

            //validate seasonname
            if (empty($seasonname)) {
                $err3 = "season name status field cannot be empty";
            }

            //validate memberstatus
            if (empty($memberstatus)) {
                $err4 = "member status field cannot be empty";
            }

            //validate memberid
            if (empty($memberid)) {
                $err5 = "Member ID field cannot be empty";
            }


            //check if there is no validation error and update record in database
            if ($err1 =="" && $err2 =="" && $err3=="" && $err4=="" && $err5==""){

            	$sqlapprove = "UPDATE group_members SET member_status = '$memberstatus' WHERE memberId='$memberid'";

            	var_dump($sqlapprove);

                if (!mysqli_query($con,$sqlapprove)) {
                    echo("Error Description: ".mysqli_error($con));
                }else{

                   $update = "<span class='alert alert-success'>$lastname $firstname has been approved to join $seasonname season!</span>";
                   header("Location: http://localhost/gofitters/approvemember.php?success=$update");
                }

            

    }

}


?>


<?php 

    $gofitmemberid = $_GET['id'];
    $gofitquery = "SELECT memberId,member_status,profiles.lastname,profiles.firstname,seasons.seasonName 
    FROM group_members INNER JOIN profiles ON group_members.profileId = profiles.profileId 
    INNER JOIN seasons ON group_members.seasonId = seasons.seasonId  
    WHERE memberId='$gofitmemberid'";

    

    //Check if
    if(!mysqli_query($con,$gofitquery)){
        echo "Error: ".mysqli_error($con);
    }
    $gofitresult = mysqli_query($con,$gofitquery);
    $userinfo = mysqli_fetch_array($gofitresult);

    // var_dump( $userinfo);

 ?>

<div class="container-fluid">

 <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3>Approve this User</h3>
                <!-- Bootstrap form -->
                <form class="form-vertical" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                	<div class="form-group">
                        <label for="memberid">Member Identification Digit</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="memberid" id="memberid" class="form-control" placeholder="Enter your lastname" value="<?php echo $userinfo['memberId'];?>">
                        </div>
                        <span class="error"><?php echo $err5; ?></span>
                    </div>

                	<div class="form-group">
                        <label for="lastname">Last Name</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your lastname" value="<?php echo $userinfo['lastname'];?>">
                        </div>
                        <span class="error"><?php echo $err1; ?></span>
                    </div>


                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your lastname" value="<?php echo $userinfo['firstname'];?>">
                        </div>
                        <span class="error"><?php echo $err2; ?></span>
                    </div>


				    <div class="form-group">
				      <label for="memberstatus">Set Status</label>
				      <div class="radio">
				        <label>
				          <input type="radio" name="memberstatus" id="pending" value="pending" <?php if($userinfo['member_status']=='pending'){echo "checked";}?>>
				          Pending
				        </label>
				      </div>

				      <div class="radio">
				        <label>
				          <input type="radio" name="memberstatus" id="terminated" value="terminated" <?php if($userinfo['member_status']=='terminated'){echo "checked";}?>>
				          Terminated
				        </label>
				      </div>

				      <div class="radio">
				        <label>
				          <input type="radio" name="memberstatus" id="approved" value="approved" <?php if($userinfo['member_status']=='approved'){echo "checked";}?>>
				          Approved
				        </label>
				        <div><span class="gofitterserr"><?php echo $err3; ?></span></div>
				      </div>
				    </div>


				    <div class="form-group">
                        <label for="seasonname">Season Name</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="seasonname" id="seasonname" class="form-control" placeholder="Enter your lastname" value="<?php echo $userinfo['seasonName'];?>">
                        </div>
                        <span class="error"><?php echo $err4; ?></span>
                    </div>

                    <input type="submit" name="submit" id="approvestatus" value="Update" class="btn btn-success btn-lg">

                </form>

            </div>
            <div class="col-md-2"></div>

        </div>

    </div>
</div>