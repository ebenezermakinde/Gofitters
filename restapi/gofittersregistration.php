<?php
// connection to database
include('../config.php');

//My input verification function
include('../gofittersfunctions.php');



if($_SERVER['REQUEST_METHOD']=='POST'){


			$firstname = gofitters_input($_POST['firstname']);
            $lastname = gofitters_input($_POST['lastname']);
            $username = gofitters_input($_POST['username']);
            $emailaddy = gofitters_input($_POST['emailaddy']);
            $gender = gofitters_input($_POST['gender']);
            $nickname = gofitters_input($_POST['nickname']);
            $interests = gofitters_input($_POST['interests']);
            $dateOfBirth = gofitters_input($_POST['dateOfBirth']);
            $password = gofitters_input($_POST['passwd']);

		$mypassword = md5($password);

		
		
				//insert data new users into gofitters table.
                $gofitsql = "INSERT INTO profiles(username, password, firstname, lastname, gender, dateOfBirth,email,interests,roleId,nickname)
                        VALUES('$username','$mypassword','$firstname','$lastname','$gender','$date','$emailaddy','$interests'
                        ,'4','$nickname')";


			if(!mysqli_query($con,$gofitsql)){
				
				$feedback = array("msg"=> "Error, Unable to add user! ".mysqli_error($con), "status"=> 1);
			}else{
				$feedback = array("msg"=> "Done, User was added successfully!", "status"=> 0);
			}

}else{

	$feedback = array("msg"=> "Error, Request method not accepted!", "status"=> 121);
}

// output header
header('Content-type: application/json');
echo json_encode($feedback);


?>