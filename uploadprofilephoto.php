<?php
$title = " | Profile Image";
include('innerhead.php');
include('gofittersfunctions.php');
// echo '<pre>';
// print_r($_FILES);
// echo '</pre>';

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$profileid = $_SESSION['profileId'];
$fstname =  $_SESSION['fstname'];
$lstname =  $_SESSION['lstname'];



		//Check if upload image button is clicked
	 if (isset($_POST['submit']) && $_POST['submit']=='Upload Image') {


            	//Check if global variable $_FILES has a value
                 if(!$_FILES['profileimage']['error']>0){


                 	//Assign which folder to upload the profile images.
                    $folder = "profileimages/";
                    $filename = $_FILES['profileimage']['name']; //check this to point o
                    $filesize = $_FILES['profileimage']['size'];
                    $filetype = $_FILES['profileimage']['type'];
                    $tempfolder = $_FILES['profileimage']['tmp_name'];

                    //get the file extension
                    $file_ext = strtolower(end(explode(".",  $filename)));

                    //specify extensions allowed
                    $extensions = array('png','jpg','jpeg','gif');

                    //check for valid extension
                    if(in_array($file_ext, $extensions)===false){
                        $error[]="extension not allowed, please upload profile photo in png,jpg,jpeg,gif file format";
                    }

                    //check the file size
                    if($filesize > 20972152){
                        $error[]="File size must not be more than 2MB";
                    }

                    //To prevent duplicate files
                    $filename = $filename; //.time();
                    $destination = $folder.$filename;//".$file_ext";

                    //check if there's no file upload error.
                    if(empty($error)==true){

                       move_uploaded_file($tempfolder, $destination);

                    //insert data into profiles table.
                	$sqlprofilephoto = "UPDATE profiles SET profileimage = '$filename' WHERE profileId = '$profileid'";
                       // $sqlprofilephoto = "INSERT INTO profiles(profileimage) VALUES WHERE profileId = $profileId";

                    // var_dump($profileId);
                    

                	if (!mysqli_query($con,$sqlprofilephoto)) {
                    echo("Error Description: ".mysqli_error($con));
                }else{
                    $result =  "<span class = alert alert-success>Dear ".$fstname ." ".$lstname. ",you have successfully uploaded your image <br/></span>";
                    $result .= "<a href ='home.php'>Click here to return to the your dashboard</a>";

                    echo $result; 
                }


             }



        }else{
        	echo "<span class='alert alert-danger'>You have to uploaded a profile image</div>";
        }

}
?>


		<div class="container-fluid">

			<div class="container" style="margin-top: 45px">

			<div class="row">

                <h2 style="text-align: center">Change/Upload a New Profile Photo</h2>    

			<div class="col-md-offset-4 col-md-4 col-md-offset-4">


		<form class="form-vertical" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype = "multipart/form-data" >

                    

	 				<div class="form-group">
                        <label for="profileimage">Profile Image</label>
                        <input type="file" name="profileimage" id="profileimage" class="form-control">

                    </div>
                    <div class="form-group">
                    	 <input type="hidden" name="profileid" id="profileid" value="<?php echo $_SESSION['profileId'] ?>">
                    	<input type="submit" name="submit" id="profileimage" class="btn btn-primary" value="Upload Image">

                    </div>

         </form>
                     </div>
         		</div>

         	</div>

        </div>


<?php include('innerfoot.php');  ?>