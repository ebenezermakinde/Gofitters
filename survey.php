<?php
include('innerhead.php');

    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    $profileid = $_SESSION['profileId'];
    
?>




     <div class="container">

  <div class="row">
    
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">
  
      <h4>Create Survey for Members</h4>
      <div id="surveyerror"></div>
         <form class="form-vertical" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >

        <div class="form-group">
        <label for="profileid">Creator</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="profileid" id="profileid" class="form-control" placeholder="Enter your First Name" value="<?php echo $_SESSION['profileId'];?>">
      </div>
       <span class="gofitterserr"><?php echo $err1 ?></span>
      </div>


       <?php
            //Read and fetch season id from the seasons table
            $queryseasonid = "SELECT seasonId,seasonName FROM seasons WHERE profileId = '$profileid'";
            $result = mysqli_query($con,$queryseasonid);
            //Check if the sql is okay
            if(!mysqli_query($con,$queryseasonid)){
            echo "Error: ".mysqli_error($con);
            }

            // var_dump( $profileid);
           ?>


      <div class="form-group">


        <select name="seasonId" id="seasonid">

                    <label for="seasons">seasons</label>
                        <option value="0">Select Season Name</option>
                        <?php
                            //display options from the seasons table
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['seasonId']; ?>"> 
                            <?php echo $row['seasonName']; ?>

                           
                        </option>
                        <?php
                         }
                        ?>

                    </select>
                   <span class="gofitterserr"><?php echo $err2 ?></span>


                   <div></div>

      </div>


        <div class="form-group">
        <label for="surveytext">Suvery Text</label>
        
      <textarea class="form-control" name="surveytext" id="surveytext" rows="6" cols="90"><?php echo $_POST['surveytext'];?></textarea>
        
       <span class="gofitterserr" id="err3" ></span>
      </div>


        <div class="form-group">
        <input type="hidden" name="profileid" id="profileid" value="<?php echo $profileid; ?>">
      <!--   <input type="hidden" name="seasonid" id="seasonid" value="Clear Text"> -->
        <input type="reset" name="clearform" id="clearform" class="btn btn-primary" value="Clear Text">
        <input type="button" name="createsurvery" id="createsurvey" class="btn btn-success" value="Create Survey">
       
      </div>

    </form>

    </div>

  </div>

   </div>

    <div class="container-fluid">
       <div class="row">
               
               <div class="col-md-12">
                    <!--display thread-->
                    <div id=surveycreated></div>
               </div>
               
          </div>
  
   
</div>

<?php ('innerfoot.php') ?>
<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
<script type="text/javascript">
  
$(document).ready(function(){
  //Display the added survey in survey page.
  $('#createsurvey').click(function(){
  // alert('ajax is sweet');
  //declare the variables.
  var profileid = $('#profileid').val();
  var seasonid = $('#seasonid').val();
  var surveytext = $('#surveytext').val();



  if(surveytext==''){

    document.getElementById('err3').innerHTML = "Survey Text cannot be empty";
  }else{

             //send the data to createsurvey.php using jquery ajax het
            $.get("createsurvey.php",{profileid:profileid, seasonid:seasonid, surveytext:surveytext},function(data){
            //display the return data in browser/displaythread div
            $('#surveycreated').html(data);

          })
  }

  });
            //display all surveys in surveys.php
            $('#surveycreated').load("createsurvey.php");

});



</script>