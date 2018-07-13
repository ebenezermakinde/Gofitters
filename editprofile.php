<?php 
include('innerhead.php');
include('gofittersfunctions.php');



        //check if register button is clicked
        // if ($_SERVER['REQUEST_METHOD']=='POST') {

            if (isset($_POST['submit']) && $_POST['submit']=='Update') {
              
              // var_dump($_POST);  
            $lastname = gofitters_input($_POST['lastname']);
            $firstname = gofitters_input($_POST['firstname']);
            $gender = gofitters_input($_POST['gender']);
            $roleid = gofitters_input($_POST['roleId']);
            $profileid = gofitters_input($_POST['profileid']);

            //validate lastname
            if (empty($lastname)) {
                $err1 = "lastname field cannot be empty";
            }

            //validate firstname
            if (empty($firstname)) {
                $err2 = "firstname field cannot be empty";
            }

            
            //validate gender
            if (empty($gender)) {
                $err3 = "Gender field cannot be empty";
            }

            //validate roleid
            if (empty($roleid)) {
                $err4 = "Role field cannot be empty";
            }
            

            //check if there is no validation error and insert into database
            if ($err1 =="" && $err2 =="" && $err3 =="" && $err4 =="") {
                
                //encrypt password
                // $mypassword = md5($password);
                // echo $mypassword;

                //Update users data in user table.
                $editsql = "UPDATE profiles SET lastname='$lastname',firstname='$firstname',
                gender='$gender', roleId='$roleid' WHERE profileId='$profileid'";

                // var_dump($editsql);
                        
                if (!mysqli_query($con,$editsql)) {
                    echo("Error Description: ".mysqli_error($con));
                }else{

                   $update = "<span class='alert alert-success'>$lastname $firstname profile was successfully updated!</span>";
                   header("Location: http://localhost/gofitters/listusers.php?success=$update");
                }
            }

        }

?>

<?php
    $gofitprofileid = $_GET['id'];
    $gofitquery = "SELECT lastname,firstname,gender,profileId FROM profiles WHERE profileId='$gofitprofileid'";

    //Check if
    if(!mysqli_query($con,$gofitquery)){
        echo "Error: ".mysqli_error($con);
    }
    $gofitresult = mysqli_query($con,$gofitquery);
    $userinfo = mysqli_fetch_array($gofitresult);

    // var_dump($_SESSION);

?>

     <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3>Edit Profile</h3>
                <!-- Bootstrap form -->
                <form class="form-vertical" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your lastname" value="<?php echo $userinfo['lastname'];?>">
                        </div>
                        <span class="error"><?php echo $err1; ?></span>
                    </div>


                    <div class="form-group">
                        <label for="message">Firstname</label>
                         <div class="input-group">
                         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your firtname" value="<?php echo $userinfo['firstname'];?>">
                        </div>
                        <span class="error"><?php echo $err2; ?></span>
                    </div>


                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="radio">
                                <label>
                                  <input type="radio" name="gender" id="female" value="female" <?php if($userinfo['gender']=='female'){echo "checked";}?>>
                                  Female
                                </label>
                              </div>

                              <div class="radio">
                                <label>
                                  <input type="radio" name="gender" id="male" value="male" <?php if($userinfo['gender']=='male'){echo "checked";}?>>
                                  Male
                                </label>
                                 <span class="error"><?php echo $err3; ?></span>
                              </div>


                        </div>

                        <?php
                              //read and fetch roles from the roles table
                              $query = "SELECT * FROM roles";
                              $result = mysqli_query($con,$query);
                              //Check if the sql is okay
                              if(!mysqli_query($con,$query)){
                                echo "Error: ".mysqli_error($con);
                              }

                              var_dump( $result);
                              ?>

                        <div class="form-group">
                        
                        <div class="col-md-8">
                            <label for="roles">Roles</label>
                        <select name="roleId">

                        <option value="0">Select Role</option>
                        <?php
                            //display options from the roles table
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <option value="<?php echo $row['roleId']; ?>" <?php if($userinfo['roleId']==$row['roleId']){echo "selected";} ?>> 
                            <?php echo $row['rolename']; ?>

                           
                        </option>
                        <?php
                         }
                        ?>

                    </select>
                    <span class="error"><?php echo $err4?></span>

                    </div>
                    </div>

                    <input type="hidden" name="profileid" value="<?php echo $gofitprofileid; ?>">
                    <input type="reset" name="" class="btn btn-default btn-lg" value="Clear">
                    <input type="submit" name="submit" value="Update" class="btn btn-success btn-lg">
                </form>
                
            </div>



       
      </div>

  </div>


<br>
<hr>
<?php include('innerfoot.php');?>

