<?php
$title = " | Update Pages";
include('innerhead.php');
include('gofittersfunctions.php');

// var_dump($sectiontittle);
?>
<?php
if (isset($_POST['submit']) && $_POST['submit']=='Save') {
     //Variables declaration
    $pageId=gofitters_input($_POST['pageid']);
	// $pagetitle = gofitters_input($_POST['pagetitle']);
	$sectiontittle=gofitters_input($_POST['sectiontitle']);
	$sectionbody=gofitters_input($_POST['sectionbody']);
	$sectionimage=gofitters_input($_POST['sectionimage']);
	$subsectiontitle2=gofitters_input($_POST['subsectiontitle2']);


            //validate pageId
            if (empty($pageId)) {
                $err1 = "pageId field cannot be empty";
            }

            //validate pagetitle
            if (empty($pagetitle)) {
                $err2 = "page title field cannot be empty";
            }

            //validate sectiontittle
            if (empty($sectiontittle)) {
                $err3 = "sectiontittle field cannot be empty";
            }

            //validate subsectiontitle2
            // if (empty($subsectiontitle2)) {
            //     $err3 = "sectiontittle field cannot be empty";
            // }

            //validate sectionbody
            if (empty($sectionbody)) {
                $err4 = "sectionbody field cannot be empty";
            }

            

            //check if there is no validation error and insert into database
            if ($err1 =="" && $err3 =="" && $err4 =="" && $err5 =="") {

            

           //insert data into users table.
            $gofitsql = "INSERT INTO section(pageId, sectiontitle,subsectiontitle2 , sectionbody, sectionimage, profileId)
                        VALUES('$pageId','$sectiontittle', '$subsectiontittle2','$sectionbody','$sectionimage','1')";

                  // echo "<pre>";
                  // print_r($gofitsql);
                  // echo "</pre>";

                  if (!mysqli_query($con,$gofitsql)) {
                    echo("Error Description: ".mysqli_error($con));
                }else{
                    $result = "Dear ".$firstname ." ".$lastname. ",your have successful done the job";
                    // $result .= "<a href ='login.php'> Click here to login</a>";

                    header("Location: http://localhost/gofitters/createsections.php");

                    echo $result; 
                }
            }

     }
?>

<?php
    // $myuserid = $_GET['id'];
    $query1 = "SELECT * from pages";

    //Check if
    if(!mysqli_query($con,$query1)){
        echo "Error: ".mysqli_error($con);
    }
    $result1 = mysqli_query($con,$query1);
    $userinfo = mysqli_fetch_array($result1);

    // "<pre>";
    // print_r($userinfo);
    // "</pre>";
?>

    <!-- The sign up form starts here. -->
    <div class="container-fluid divbgimg">
       <div class="container formdiv">
        <div class="row">
          <div class="col-md-offset-2 col-md-8 col-md-offset-2  formcolor">
            <h3 id="followus">CMS SECTION</h3>
            
            <!-- The Registration Form starts here -->
    <form id="signupform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>  ">
    	
      <div class="form-group">
        <label for="pageid">Page ID</label>

        <select name="pageid">

                        <option value="">Select Page</option>
                        <?php
                            //display options from the pages table
                            while($row = mysqli_fetch_assoc($result1)){
                        ?>
                        <option value="<?php echo $row['pageId']; ?>"> 
                            <?php echo $row['pagetitle']; ?>       
                        </option>
                        <?php
                         }
                        ?>
          </select>


      <?php echo $_POST['pageid'];?>
      
       <span class="gofitterserr"><?php echo $err1; ?></span>
      </div>

    
      <div class="form-group">
        <label for="sectiontitle">Section Title</label>
        
       <input type="text" name="sectiontitle" id="sectiontitle" class="form-control" placeholder="Enter the section title here" value="<?php echo $_POST['sectiontitle'];?>">
      
       <span class="gofitterserr"><?php echo $err3; ?></span>
      </div>

       <div class="form-group">
        <label for="subsectiontitle2">Sub-Section Title2</label>
        
       <input type="text" name="subsectiontitle2" id="subsectiontitle2" class="form-control" placeholder="Enter the sub-section title2 if it's applicable" value="<?php echo $_POST['subsectiontitle2'];?>">
      
       <span class="gofitterserr"><?php echo $err5; ?></span>
      </div>

      <div class="form-group">
        <label for="sectionbody">Section Body</label>
        
       <textarea class="form-control" name="sectionbody" id="sectionbody" rows="6" cols="90"><?php echo $_POST['sectionbody'];?></textarea>
        
       <span class="gofitterserr"><?php echo $err4; ?></span>
      </div>

      <div class="form-group">
        <label for="sectionimage">Section Image</label>
        
       <input type="file" name="sectionimage" id="sectionimage" class="form-control" placeholder="Enter your preferred username" value="<?php echo $_POST['sectionimage'];?>">
      
      </div>


       <div class="form-group">
       <input type="reset" name="clearform" id="clearform" class="btn btn-primary" value="Clear Form">
        <input type="submit" name="submit" id="createsections" class="btn btn-success" value="Save">
      
      </div>

    </form>

      </div>    
    </div>
    </div>
        <!-- This div shows all the sections added to the DB -->
      <div class="row">
        
        <div class="col-md-12">
          
          <div id="sectionsresult"></div>


        </div>

      </div>


  </div>


<?php include('innerfoot.php');?>