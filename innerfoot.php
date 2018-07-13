<?php
	if($con){
	mysqli_close($con);
	}
?>

<div class="container-fluid" style="background-color: grey; text-align: center; position: relative; bottom: 0; width: 100%">
copyright &copy; <?php  date_default_timezone_set('Africa/Lagos');  echo date('Y'); ?> , GoFitters. All Rights Reserved.
</div>
<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script> 
<script type="text/javascript">

$(document).ready(function(){

	//Team toggle button.
	 $('.toggleicon').mouseover(function(){

	 	// $(this).text("click on the button to join a team");

	 });


	//Team Toggle button function.
	$('.buttonjoin').hide();
 $('.toggleicon').click(function () {
                $(this).parent().next().toggle(500);
            });


 //This is the seasons Ajax. 
$('#createseason').click(function(){

	//ID of variables.
	var seasonname = $('#seasonname').val();
	var seasonimage = $('#seasonimage').val();
	var confirmdate = $('#confirmdate').val();
	var seasonprice = $('#seasonprice').val();

	if(seasonname ==""){
		alert("you cannot proceed");
	}else{


			
	$.get("viewseasons.php",{getseasonname:seasonname, getseasonimage:seasonimage, getconfirmdate:confirmdate, getseasonprice:seasonprice},function(data){
		//display the return data in browser/sectionsresult div
		$('#displayseason').html(data);
		      });
		}	

		});
	
	$('#displayseason').load('viewseasons.php');


})

</script>
</body>
</html>