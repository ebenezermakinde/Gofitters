<?php
$title = "| Dashboard"; 
include('innerhead.php');

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
$surveyid = $_SESSION['surveyId'];
$profileid = $_SESSION['profileId'];
$filename = $_SESSION['profileimage'];

?>

<div class="container-fluid divbgimg">
        <div class="row">
            <!-- Profile Images -->
            <div class="col-md-2">
                <?php if(!empty($_SESSION['profileimage'])){?>
            <img src="profileimages/<?php echo $_SESSION['profileimage']; ?>" alt='profileimage' 
            class="img-responsive profileimg" style="width: 150px; height: 150px; border-radius: 50%" />

                <?php }else{?>

                <?php if($_SESSION['gender'] == 'Female'){?>
            
                <img src="icons/female.png" alt="woman" class="img-responsive profileimg" 
                width=150px height="150px" style="border-radius:50% ";  />
                <?php }else{
                    ?>
                    <img src="icons/male.png" alt="man" class="img-responsive profileimg" 
                    width=150px height="150px" style="border-radius:50% "; />
                    <?php 

                        } 
                    }
                        ?>
                <br/>
                <a href="uploadprofilephoto.php">upload an image</a>
            </div>

            <!-- User Bio Data -->

            <div class="col-md-7">
             <h4 style="text-align: center">GoFitters Bio Data</h4>
                <div class="row" style="background-color: skyblue">

                    <div class="col-md-2" style="border:2px dashed grey ">
                        <h4 style="text-align: center">Profile Id</h4>
                        <h5 style="text-align: center"><?php echo $_SESSION['profileId']; ?></h5>
                    </div>

                    <div class="col-md-2" style="border:2px dashed grey ">
                        <h4 style="text-align: center">Lastname</h4>
                        <h5 style="text-align: center"><?php echo $_SESSION['lstname']; ?></h5>
                   </div>

                   <div class="col-md-2" style="border:2px dashed grey ">
                        <h4 style="text-align: center">Firstname</h4>
                        <h5 style="text-align: center"><?php echo $_SESSION['fstname']; ?></h5>
                    </div>
                    
                    <div class="col-md-2" style="border:2px dashed grey " >
                        <h4 style="text-align: center">Username</h4>
                        <h5 style="text-align: center"><?php echo $_SESSION['usrname']; ?></h5>
                     </div>
                    
                    <div class="col-md-2" style="border:2px dashed grey ">
                        <h4 style="text-align: center">Nickname</h4>
                         <h5 style="text-align: center"><?php echo $_SESSION['nckname']; ?></h5>
                    </div>

                    <div class="col-md-2" style="border:2px dashed grey ">
                        <h4 style="text-align: center">Gender</h4>
                        <h5 style="text-align: center"><?php echo $_SESSION['gender']; ?></h5>
                    </div>

                 </div>

                 <div class="row" style="background-color: skyblue">

                    <div class="col-md-6" style="border:2px dashed grey ">
                        
                        <h4 style="text-align: center">Email</h4>
                         <h5 style="text-align: center"><?php echo $_SESSION['email']; ?></h5>

                    </div>

                    <div class="col-md-6" style="border:2px dashed grey ">
                        
                        <h4 style="text-align: center">Interests</h4>
                         <h5 style="text-align: center"><?php echo $_SESSION['intrst']; ?></h5>

                    </div>

                    
                 </div>

                 <form></form>
                 <input type="hidden" name="profileid" id="profileid" value="<?php echo $_SESSION['profileId']; ?>">
             </div>    
           
            <!-- The Search Bar for GoFitters -->
            <div class="col-md-3">
            
        </div>
            </div>
            <div class="row" style="height: 900px;">
            <div class="col-md-2"  style="height: 900px; padding: 5px">
            
                
       
           <div class="badge badge-primary"><a href="home.php" style="font-size: 30px">Dashboard</a></div>
            <?php 
            // echo "<pre>";
            // var_dump($gofitaccess); 
            // echo "</pre>";
            foreach($gofitaccess as $key => $value) {
                //print only the items for menu
                if($value[2]==1){
            ?>  
                <div>
                    
               <a href="<?php echo $value[1];?>" class="badge badge-primary" style="font-size: 20px; margin: 10px"> 
                <?php echo $value[0]?> </a>
                            
                </div>
                <?php
                    }
                }

                ?> 
                   
            <div class="badge badge-primary" style="font-size: 30px"><a href="logout.php">Log Out</a></div>
                

            
         
         </div>

            <?php 
                //Fetch from group_members details for each member to display on dashboard.
            $myseasonquery = "SELECT group_members.*,seasons.seasonName,seasons.seasonimage,seasons.seasonPrice,
            profiles.lastname, profiles.Firstname FROM group_members INNER JOIN seasons ON 
            group_members.seasonId = seasons.seasonId 
            INNER JOIN profiles ON profiles.profileId = seasons.profileId WHERE group_members.profileId  = '$profileid'";

             $resultquery = mysqli_query($con,$myseasonquery);

             // var_dump( $resultquery);

             if(!mysqli_query($con, $myseasonquery)) {
                echo "Error: ".mysqli_error($con);
                }
             ?>


             <!-- This div contains my Seasons View -->
    <div class="col-md-4" id="membersjoined">

        <div>
            <h2>My Seasons View</h2>
        </div>

        <table class="table   table-hover">
            <tr style="background-color: skyblue">
                <th>Season</th>
                <th>Season Icon</th>
                <th>Cost of Season</th>
                <th>Trainer</th>
                <th>My Status</th>
            </tr>

    <?php
    //display the result in table row
    while($row = mysqli_fetch_assoc($resultquery)){
    ?>




         
             
    <tr>
        <td><?php echo $row['seasonName']; ?></td>
        <td><img class="myseasons img-responsive" src="seasonimg/<?php echo $row['seasonimage']; ?>" 
        alt="<?php echo $row['seasonName']; ?>" style="width:90px; height: 90px;"></td>
        <td><?php echo $row['seasonPrice']; ?></td>
        <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
        <td><?php echo $row['member_status']; ?></td>
    </tr>
           

            <?php

        } //end of loop
    
 
            ?>

      </table>
             
      </div>    

        <?php
            //This is the query to dispay survey for each member based on their profileId which is in session.
            $surveysql = "SELECT group_members.*,seasons.seasonName,group_members.profileId,surveys.surveytext,surveys.surveyId FROM group_members 
            INNER JOIN surveys ON surveys.seasonId = group_members.seasonId INNER JOIN profiles ON 
            profiles.profileId = group_members.profileId
            INNER JOIN seasons ON group_members.seasonId = seasons.seasonId WHERE group_members.profileId ='$profileid'
            and group_members.member_status='approved'";

             $resultsurvey = mysqli_query($con, $surveysql);

             // var_dump($resultsurvey);
             if(!mysqli_query($con, $surveysql)) {
                echo "Error: ".mysqli_error($con);
                }
         ?>

         <!-- This div contains my survey view -->
         <div class="col-md-6" id="membersurvey">
            <div>
            <h2>My Season Surveys</h2>
            </div>
            <table class="table   table-hover">
            <tr style="background-color: skyblue">
                
                <th>Season</th>
                <th>Survery Text</th>
                <th>Action</th>
            </tr>

            <?php
            //display the result in table row
            while($row = mysqli_fetch_assoc($resultsurvey)){
            ?>

            <tr>
              
              <td><?php echo $row['seasonName']; ?></td>
              <td><?php echo $row['surveytext']; ?></td>
              <td>
              <form method="post" action=respond.php>
                  <input type="hidden" name="surveyid" id="surveyid" value="<?php echo $row['surveyId']; ?>">
                  <input type="hidden" name="seasonname" id="seasonname" value="<?php echo $row['seasonName']; ?>">
                  <input type="submit" name="userresponse" id="userresponse" class="btn btn-primary" value="Respond">
              </form>
               </td>
            </tr>

                 <?php

                } //end of loop
    
                ?>

        </table>
            
         </div>

     </div>
         
</div>

<?php include('innerfoot.php'); ?>