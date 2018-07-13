<?php
// connection to database
include('../config.php');

// function to validate, trim and htmlspecialchars inputs
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;		
	}


if($_SERVER['REQUEST_METHOD']=='POST'){


		$lastname = test_input($_POST['lastname']);
		$firstname = test_input($_POST['firstname']);
		$gender = test_input($_POST['gender']);
		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']);

		$mypassword = md5($password);

		// save into database table
		$sql = "INSERT INTO users(lastname, firstname, gender, username, password, roleid ) VALUES ('$lastname', '$firstname', '$gender', '$username', '$mypassword', '3')";

			if(!mysqli_query($con,$sql)){
				
				$feedback = array("msg"=> "Error, Unable to add user! ".mysqli_error($con), "status"=> 0);
			}else{
				$feedback = array("msg"=> "Done, User added successfully!", "status"=> 1);
			}

}else{

	$feedback = array("msg"=> "Error, Request method not accepted!", "status"=> 0);
}

// output header
header('Content-type: application/json');
echo json_encode($feedback);


?>