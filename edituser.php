<?php 
include('innerhead.php');
include('gofittersfunctions.php');

// var_dump($_SESSION);

        //check if register button is clicked
        // if ($_SERVER['REQUEST_METHOD']=='POST') {

            if (isset($_POST['submit']) && $_POST['submit']=='Update') {
              
              // var_dump($_POST);  
            $lastname = gofitters_input($_POST['lastname']);
            $firstname = gofitters_input($_POST['firstname']);
            $username = gofitters_input($_POST['username']);
            // $interest = gofitters_input($_POST['interest']);
            $nickname = gofitters_input($_POST['nickname']);

            //validate lastname
            if (empty($lastname)) {
                $err1 = "lastname field cannot be empty";
            }

            //validate firstname
            if (empty($firstname)) {
                $err2 = "firstname field cannot be empty";
            }

            
            //validate username
            if (empty($username)) {
                $err3 = "username field cannot be empty";
            }

            //validate interest
            // if (empty($Interest)) {
            //     $err4 = "Interest field cannot be empty";
            // }

            //validate nickname
            if (empty($nickname)) {
                $err5 = "Nickname field cannot be empty";
            }
            

            //check if there is no validation error and insert into database
            if ($err1 =="" && $err2 =="" && $err3 =="" && $err5 =="") {
                
                //encrypt password
                // $mypassword = md5($password);
                // echo $mypassword;

                //Update users data in profile table.
                $editsql = "UPDATE profiles SET lastname='$lastname',firstname='$firstname',
               username='$username', nickname= '$nickname' WHERE profileId='$profileid'";

                var_dump($editsql);
                        
                if (!mysqli_query($con,$editsql)) {
                    echo("Error Description: ".mysqli_error($con));
                }else{

                   $update = "<span class='alert alert-success'>Dear $lastname $firstname,you have successfully updated your details!</span>";
                   header("Location: http://localhost/gofitters/home.php?success=$update");
                }
            }

        }

?>



     <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
         if(isset($_GET['success'])){
            echo "<div class=alert alert-success> ".$_GET['success']." </div>";

         } 

            ?>
                
            </div>
            <div class="col-md-6">
                <h3>Edit Profile</h3>
                <!-- Bootstrap form -->
                <form class="form-vertical" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your lastname" value="<?php echo $_SESSION['fstname']; ?>">
                        </div>
                        <span class="gofitterserr"><?php echo $err1; ?></span>
                    </div>


                    <div class="form-group">
                        <label for="message">Firstname</label>
                         <div class="input-group">
                         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your firtname" value="<?php echo $_SESSION['lstname']; ?>">
                        </div>
                        <span class="gofitterserr"><?php echo $err3; ?></span>
                    </div>

                     <div class="form-group">
                        <label for="username">username</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" value="<?php echo $_SESSION['usrname'];?>">
                        </div>
                        <span class="gofitterserr"><?php echo $err3; ?></span>
                    </div>

                    


                        
                    <div class="form-group">
                        <label for="nickname">Nick Name</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Enter your nickname" value="<?php echo $_SESSION['nckname'];?>">
                        </div>
                        <span class="gofitterserr"><?php echo $err5; ?></span>
                    </div>






                    <input type="hidden" name="profileid" value="<?php echo $_SESSION['profileId'] ?>">
                    <input type="reset" name="" class="btn btn-default btn-lg" value="Clear">
                    <input type="submit" name="submit" value="Update" class="btn btn-success btn-lg">
                </form>
                
            </div>



       
      </div>

  </div>


<br>
<hr>
<?php include('innerfoot.php');?>

