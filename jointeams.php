<?php 
$title = " | Join Teams";
include('innerhead.php');

// var_dump($_SESSION);
 ?>






<!--Second row starts here  -->

      <div class="container-fluid teambgimg">

        <div class="container">
          
          <div class="row">
            
            <div class="col-md-12">

              <div class="row">

              <div class="col-md-12" id="h1teamcaption">
              <h3 id="h3teamcaption">Find a Team or Event Registered on GoFitters</h3>
              </div>
              </div>

              <!-- The search form for Teams or Events -->
              
                <div class="form-group">
                  <div class="input-group">
                <input type="search" name="searchteam" id="searchteam" class="form-control" placeholder="Search for a team Registered">
                <span class="input-group-addon"><a href="#"><i class="glyphicon glyphicon-search"></i></a></span>
                </div>
                </div>
              

            </div>

          </div>

        </div>

      </div>


     <!-- Registered Teams on the platform -->

      <div class="container teamdivscontainer">

        

      <?php
      $gofitsql = "select * from seasons";
      if(!mysqli_query($con, $gofitsql)){
        echo "This is Error: ".mysqli_error($con);
      }
      $result = mysqli_query($con, $gofitsql);

      //number of columns
      $numcol = 3;
      $bootstrapcolwidth = 12 / $numcol;
      $row = mysqli_fetch_all($result, MYSQLI_BOTH);

      $arraychunk = array_chunk($row, $numcol);
      // echo "<pre>";
      // print_r($arraychunk);
      // echo "</pre>";
      foreach($arraychunk as $row){

        // var_dump($row);
      ?>

      <div class="row">
      <?php foreach ($row as $row) {  
      //  echo "<pre>";
      // print_r($arraychunk);
      // echo "</pre>";
       ?>
      
       
       <div class="col-md-<?php echo $bootstrapcolwidth; ?>">
       <img src="seasonimg/<?php echo $row['seasonimage']; ?>" alt="<?php echo $row['seasonName'] ?>" class="img-responsive teamicons">
        <div class="form-group">

       <p><?php echo $row['seasonName']; ?></p>
         <button class="toggleicon"><i class="glyphicon glyphicon-plus"></i></button>
        </div>

       <button class="btn btn-lg btn-primary buttonjoin" type="button" name="<?php echo $row['seasonId'];?>" id="buttonj<?php echo $row['seasonId'];?>">Join</button>
       <div id="membersjoined<?php echo $row['seasonId'];?>"></div>
      </div>
      
      <?php } ?>
      
    </div>

    <?php

      }

    ?>
     <input type="hidden" name="profileid" id="profileid" value="<?php echo $_SESSION['profileId'];?>">
    <div class="nextpage">
    <button class="btn btn-lg nextpagebtn">Next Page<span><i class="glyphicon glyphicon-chevron-right"></i></span></button>
    </div>

  </div>



    



  <?php include('innerfoot.php');?>

   <script type="text/javascript">

    $(document).ready(function(){

    $('[id^=buttonj]').click(function(){

      var $this = $(this);
      var seasonid = $this.attr('name');
      // alert(seasonid);

      //ID of variables.
  var profileid = $('#profileid').val();
  // alert(profileid);

  if(seasonid ==""){
    alert("you cannot proceed");
  }else{


      
  $.get("viewjoinedseason.php",{getseasonid:seasonid, getprofileid:profileid},function(data){
    //display the return data in browser/sectionsresult div
    $('#membersjoined'+seasonid).html(data);
          });
    } 

    });
  
  $('#membersjoined').load('approvemember.php');


        });




  </script>