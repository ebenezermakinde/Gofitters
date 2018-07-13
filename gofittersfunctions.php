<?php
/*
This file houses all the functions
called my GoFitters webb app.
*/

//input check function.
function gofitters_input($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}

//password encoding function.



?>