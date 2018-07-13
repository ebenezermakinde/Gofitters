<?php
// connection to database
include('../config.php');

//My input verification function
include('../gofittersfunctions.php');


if($_SERVER['REQUEST_METHOD']=='GET'){


		$profileid = gofitters_input($_GET['profileId']);
		
		
		// save into database table
		$gotfitsql = "SELECT * from profiles";
		$result = mysqli_query($con, $gotfitsql);

		$output = array();

		while($row = mysqli_fetch_assoc($result)){
			extract($row);

			$output [] = array("lastname"=>$lastname, "firstname"=>$firstname, 
							"gender"=> $gender, "username"=>$username, "email"=>$email, "interests"=>$interests);

			$feedback = array("msg"=>$output, "status"=>0);

		}

			
}else{

	$feedback = array("msg"=> "Error, Request method not accepted!", "status"=> 121);
}

// output header
header('Content-type: application/json');
echo json_encode($feedback);


?>