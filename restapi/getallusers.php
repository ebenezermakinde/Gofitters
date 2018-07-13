<?php
// connection to database
include('../config.php');

// function to validate, trim and htmlspecialchars inputs
	function test_input($data){
		$data = trim($data);
		$data = htmlspecialchars($data);

		return $data;		
	}


if($_SERVER['REQUEST_METHOD']=='GET'){


		$userid = test_input($_GET['userid']);
		
		
		// save into database table
		$sql = "SELECT * from users";
		$result = mysqli_query($con, $sql);

		$output = array();

		while($row = mysqli_fetch_assoc($result)){
			extract($row);

			$output [] = array("lastname"=>$lastname, "firstname"=>$firstname, "gender"=> $gender, "username"=>$username);

			$feedback = array("msg"=>$output, "status"=>1);

		}

			
}else{

	$feedback = array("msg"=> "Error, Request method not accepted!", "status"=> 0);
}

// output header
header('Content-type: application/json');
echo json_encode($feedback);


?>