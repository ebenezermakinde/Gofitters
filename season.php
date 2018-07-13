<?php 
$title = " | Create Seasons";
	include('innerhead.php');
	include('gofittersfunctions.php');
	$profileId = $_SESSION['profileId'];
	$lstname = $_SESSION['lstname'];
	$fstname = $_SESSION['fstname'];

  $seasonid = $_SESSION['seasonId'];
  $seasonname = $_SESSION['seasonname'];
  $seasonimage = $_SESSION['seasonimage'];
  $seasonprice = $_SESSION['seasonprice'];

	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
 ?>
<?php  
if (isset($_POST['submit']) && $_POST['submit']=='Create Season'){
            //Variables declaration
            $seasonname = gofitters_input($_POST['seasonname']);
            $confirmdate = gofitters_input($_POST['confirmdate']);
            $seasonprice = gofitters_input($_POST['seasonprice']);


            if(!$_FILES['seasonimage']['error'] > 0 && $_POST['ischeck']==1){

            $folder = "seasonimg/";
            $seasonimage = $_FILES['seasonimage']['name']; //multi-dimensional array
            $filesize = $_FILES['seasonimage']['size'];
            $filetype = $_FILES['seasonimage']['type'];
            $tempfolder = $_FILES['seasonimage']['tmp_name'];

                         //Get the file extension
            $file_ext = strtolower(end(explode('.', $seasonimage)));

            //These are the extensions allowed
            $extensions = array('png', 'jpg', 'jpeg', 'gif');

            // Check for valid extension
            if(in_array($file_ext, $extensions)===false){
            //Declaration of empty array
            $error[] = "extension not allowed, please upload photo in png, jpg, jpeg, gif file format";
               }

             //Check the file size; max is 2MB
              if($filesize > 2097152){
                $error[] = "file size must not be more than 2MB";
              }

              //Check if there is no file upload error
              if(empty($error)==true){

              $seasonimage = $seasonimage; //.time();
              $destination = $folder.$seasonimage; //. ".$file_ext";

              //move the file from the temp file to the destination folder(seasonimg folder)
              move_uploaded_file($tempfolder, $destination);

            //Insert data into season table.
            $seasonsql = "INSERT INTO seasons(seasonName,seasonimage,profileId,confirmedDate,seasonPrice)
                    VALUES('$seasonname','$seasonimage','$profileId','$confirmdate','$seasonprice')";

          }elseif($_POST['ischeck']==''){
          echo "No photo upload";
      }
    }  


            //validate season name for emptiness, correctness and duplicity.
            $sqlseasonnme = "SELECT * FROM seasons WHERE seasonName='$seasonname'";
            $respseasonme = mysqli_query($con, $sqlseasonnme);
            if (empty($seasonname)) {
                $errseaname = "Season Name field cannot be empty";

            }elseif(filter_var($seasonname,FILTER_VALIDATE_FLOAT)){

                $errseaname = "Season Name cannot be numbers";

            }elseif(mysqli_num_rows($respseasonme) > 0) {
            	$errseaname = "This Season Name has been taken. Kindly specify another name.";
            }

            //validate confirmation date
            if (empty($confirmdate)) {
                $errconfirmd = "Confirm Date field cannot be empty";
            }

            //validate season price
            if (empty($seasonprice)) {
                $errseaprice = "Price field cannot be empty";

            }elseif(!filter_var($seasonprice,FILTER_VALIDATE_FLOAT)){

                $errseaprice = "Invalid Price Format!";
            }


            //check if there is no validation error and insert into database
            if ($errseaname =="" && $errconfirmd =="" && $errseaprice =="") {

            //Insert data into season table.
            $seasonsql = "INSERT INTO seasons(seasonName,seasonimage,profileId,confirmedDate,seasonPrice)
            				VALUES('$seasonname','$seasonimage','$profileId','$confirmdate','$seasonprice')";

            	// echo "<pre>";
                  // print_r($seasonsql);
                  // echo "</pre>";

              if (!mysqli_query($con,$seasonsql)) {
                    echo("Error Description: ".mysqli_error($con));
                }else{
                    $result = "<span class='alert alert-success'> Dear $lstname $fstname ,you have successfully created $seasonname </span>";
                    // $result .= "<a href ='login.php'> Click here to login</a>";

                    // header("Location: http://localhost/gofitters/signin.php");

                    echo $result; 
                }
          

          }



            



  }

 


?>



 <div class="container-fluid" id="divbgimg">
 	
 	<div class="row">
 		
 		<div class="col-md-offset-4 col-md-4 col-md-offset-4">
 			<h3 style="text-align: center;">Create Your Own Season</h3>
 		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

      <div class="form-group">
        <label for="seasonname">Season Name</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="seasonname" id="seasonname" class="form-control" placeholder="Enter the name of Season" value="<?php echo $_POST['seasonname'];?>">
      </div>
       <span class="gofitterserr"><?php echo $errseaname; ?></span>
      </div>

        <div class="form-group">
       <label for="seasonimage">Season Image</label>
       <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span> 
        <input type="file" name="seasonimage" id="seasonimage" class="form-control" placeholder="season image" value="<?php echo $_POST['seasonimage']; ?>">
        </div>
        <input type="checkbox" name="ischeck" id="ischeck" value="1"> check to upload image
         <span class="error"><?php echo $imageerror; ?></span>
        </div>




      <div class="form-group">
        <label for="confirmdate">Confirmed Date</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input type="date" name="confirmdate" id="confirmdate" class="form-control" value="<?php echo $_POST['confirmdate'];?>">
      </div>
       <span class="gofitterserr"><?php echo $errconfirmd; ?></span>
      </div>

      <div class="form-group">
        <label for="seasonprice">Season Price</label>
        <div class="input-group">
        <span class="input-group-addon">&#8358;</span>
        <input type="text" name="seasonprice" id="seasonprice" class="form-control" placeholder="Enter the cost of the season" value="<?php echo $_POST['seasonprice'];?>">
        
      </div>
       <span class="gofitterserr"><?php echo $errseaprice; ?></span>
      </div>


      	<div class="form-group">
         
        <input type="reset" name="clearform" id="clearform" class="btn btn-primary" value="Clear Form">
        <input type="submit" name="submit" id="createseason" class="btn btn-success" value="Create Season">
      
      </div>

 	</form>





 		</div>
 		<!-- <div class="col-md-6"></div> -->


 	</div>

  <div class="row">
    
    <div class="col-md-2"></div>
     <div class="col-md-8"> 
       
       <div id="displayseason"></div>

     </div>
      <div class="col-md-2"></div>



  </div>


 </div>

 <?php include('innerfoot.php');?>