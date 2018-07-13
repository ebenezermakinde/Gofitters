<?php
$title = " | Terms Of Use";
include('header.php'); 
?>


  <!-- The terms of site use -->

  <div class="container">

    
    <div class="row">
      

      <div class="col-md-12">

        <div>
        <h1 style="text-align: center;">General terms and conditions</h1>
        </div>
         <!-- 1st paragraph -->
        

        <?php
         
          //select all info from sections table
          $sql = "select * from section where pageid='7'";
          $result = mysqli_query($con, $sql);

          if(!mysqli_query($con, $sql)) {
                echo "Error: ".mysqli_error($con);
              }

              //display the result in the div
              while($row = mysqli_fetch_all($result,MYSQLI_BOTH)){


              
         ?>

         

        <p>
          <h3><?php echo $row['0']['sectiontitle'] ?></h3>

         
           
            <p>
            <?php echo $row['0']['sectionbody'] ?>
            </p>

              
          <h3><?php echo $row['1']['sectiontitle'] ?></h3>

          
            <p>
            <?php echo $row['1']['sectionbody'] ?>
            </p>

        

          <h3><?php echo $row['2']['sectiontitle']; ?></h3>

          
        </p>

            <?php echo $row['2']['sectionbody']; ?>

        <p>

            
          <h3><?php echo $row['3']['sectiontitle']; ?></h3>

          </p>

            <?php echo $row['3']['sectionbody']; ?>

          <p>

        

          <h3><?php echo $row['4']['sectiontitle']; ?></h3>
          
          </p>

             <?php echo $row['4']['sectionbody']; ?>

          <p>

            

          <h3><?php echo $row['5']['sectiontitle']; ?></h3>
          </p>

           <?php echo $row['5']['sectionbody']; ?>

          <p>


            <h3><?php echo $row['6']['sectiontitle']; ?></h3>

            <p>

              <?php echo $row['6']['sectionbody']; ?>
            
           </p>

           <?php } ?>

      </div>

    </div>


  </div>


   <?php include('footer.php');?>