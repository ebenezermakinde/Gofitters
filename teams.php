<?php
$title = " | Teams";
include('header.php'); 
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
              <form>
                <div class="form-group">
                  <div class="input-group">
                <input type="search" name="searchteam" id="searchteam" class="form-control" placeholder="Search for a team Registered">
                <span class="input-group-addon"><a href="#"><i class="glyphicon glyphicon-search"></i></a></span>
                </div>
                </div>
              </form>
              

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
        <div>
       <p><?php echo $row['seasonName']; ?></p>
         <button title="Click to join" class="toggleicon"><i class="glyphicon glyphicon-plus"></i></button>
        </div>
       <button class="btn btn-lg btn-primary buttonjoin" type="button" name="<?php echo $row['seasonId'];?>" id="buttonj<?php echo $row['seasonId'];?>">Join</button>
      </div>

      <?php } ?>
      
    </div>

    <?php

      }

    ?>

    <div class="nextpage">
    <button class="btn btn-lg nextpagebtn">Next Page<span><i class="glyphicon glyphicon-chevron-right"></i></span></button>
    </div>

  </div>



    



  <?php include('footer.php');?>

  <script type="text/javascript">

    $(document).ready(function(){

    $('[id^=buttonj]').click(function(){

      var $this = $(this);
      var seasonid = $this.attr('name');
      // alert(seasonid);

      alert("You need to signup to join any season on Gofitters");

        });

//Pagination for the Teams
$(function () {
        window.pagObj = $('#pagination').twbsPagination({
            totalPages: 6,
            visiblePages: 6,
            onPageClick: function (event, page) {
                //console.info(page + ' (from options)');
                //alert(page);
        var limit = 4; //must be same
        var offset = (page -1) * 4; //must be same
        //alert(offset);
        var pageurl = "teamspage.php";
        // send the input data to the server
        $('#displayresult').load(pageurl,{limit: limit, offset: offset});

            }
        }).on('page', function (event, page) {
            console.info(page + ' (from event listening)');
        });
    });



      
})


  </script>
  
   
   

