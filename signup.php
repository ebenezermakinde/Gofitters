<?php
$title = " | Sign Up";
include('header.php');
include('gofittersfunctions.php');
?>
<?php
if (isset($_POST['submit']) && $_POST['submit']=='Register') {
            //Variables declaration
            $firstname = gofitters_input($_POST['firstname']);
            $lastname = gofitters_input($_POST['lastname']);
            $username = gofitters_input($_POST['username']);
            $emailaddy = gofitters_input($_POST['emailaddy']);
            $gender = gofitters_input($_POST['gender']);
            $roleid = gofitters_input($_POST['roleid']);
            $nickname = gofitters_input($_POST['nickname']);
            $interests = gofitters_input($_POST['interests']);
            $date = gofitters_input($_POST['dateOfBirth']);
            $password = gofitters_input($_POST['passwd']);
            $confirmpass = gofitters_input($_POST['confirmpass']);

            // var_dump($_POST);

            //validate firstname
            if (empty($firstname)) {
                $errfn = "Fast Name field cannot be empty";
            }

            //validate lastname
            if (empty($lastname)) {
                $errln = "Last Name field cannot be empty";
            }

            //validate username
            if (empty($username)) {
                $errusn = "Username field cannot be empty";
            }

            //validate nickname for emptiness,correct value and uniqueness.
            // $sqlncknme = "SELECT * FROM profiles WHERE nickname='$nickname'";
            // $respnckname = mysqli_query($con, $sqlncknme);
            if (filter_var($nickname,FILTER_VALIDATE_FLOAT)) {
                $errnck = "Nickname field must be a name";
            }
            // elseif(mysqli_num_rows($respnckname) > 0){
            //      $errnck = "This nickname has been taken, Kindly try another!";
            // }

            //validate interests
            if (empty($interests)) {
                $errintrst = "Interests field has to be filled";
            }elseif(filter_var($interests,FILTER_VALIDATE_FLOAT)){

                $errintrst = "Invalid interest value entered!";
            }

            //validate gender
            if (empty($gender)) {
                $errgend = "Kindly select a gender";
            }

            //validate roles
            if (empty($roleid)) {
                $errroles = "Kindly select your membership type";
            }

            //Validate password
            if (empty($password)) {
                $errpass = "Password field cannot be empty";
            }elseif (strlen($password) < 6) {
                 $errpass = "Password field must be longer than 5 characters";
            }

            //Validate confirm password
            if (empty($confirmpass)) {
                $errcnpass = "Confirm password field cannot be empty";
            }elseif(($confirmpass) != ($password)){
                $errcnpass = "Confirm Password is not the same as Password";

            }

            //validate email for emptiness,correct value and uniqueness.
            $sqlemail = "SELECT * FROM profiles WHERE email='$emailaddy'";
            $respemail = mysqli_query($con, $sqlemail);
            if (empty($emailaddy)) {
                $errusn = "Email field cannot be empty";
            }elseif(!filter_var($emailaddy,FILTER_VALIDATE_EMAIL)){

                $erremail = "Invalid Email Address Format!";

            }elseif(mysqli_num_rows($respemail) > 0){
                 $erremail = "This email address has been taken, Kindly try another!";
            }

            //check if there is no validation error and insert into database
            if ($errfn =="" && $errln =="" && $errusn =="" && $errgend =="" && $errpass =="" 
                && $errcnpass =="" && $erremail =="" && $errintrst ==""  && $errnck =="" && $errroles=="") {

            //encrypt password
                $mypassword = md5($password);
                echo $mypassword;

                //insert data into users table.
                $gofitsql = "INSERT INTO profiles(username, password, firstname, lastname, profileimage , 
                gender, dateOfBirth,email,interests,roleId,nickname)
                        VALUES('$username','$mypassword','$firstname','$lastname','$filename','$gender','$date','$emailaddy','$interests'
                        ,'$roleid','$nickname')";

                  // echo "<pre>";
                  // print_r($gofitsql);
                  // echo "</pre>";

                  if (!mysqli_query($con,$gofitsql)) {
                    echo("Error Description: ".mysqli_error($con));
                }else{
                $result = "<span class = 'alert alert-success'>Dear .$firstname  $lastname ,your registration was successful; sign in to your profile</span>";

                    header("Location: http://localhost/gofitters/signin.php?success=$result");

                    // echo $result; 
                }
            }

     }

?>

    <!-- The sign up form starts here. -->
    <div class="container-fluid divbgimg">
       <div class="container formdiv">
        <div class="row">
          <div class="col-md-offset-2 col-md-8 col-md-offset-2  formcolor">
            <h3 id="followus">Sign Up by filling your data</h3>

            
            
            <!-- The Registration Form starts here -->
    <form id="signupform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

       <div class="form-group">
      <label for="roleid">Signing up as:</label>

      <div class="radio">
        <label>
          <input type="radio" name="roleid" id="4" value="4" <?php if($_POST['roleid']=='4'){echo "checked";}?>>
          Member
        </label>
      </div>

      <div class="radio">
        <label>
          <input type="radio" name="roleid" id="3" value="3" <?php if($_POST['roleid']=='3'){echo "checked";}?>>
          Trainer
        </label>
        <div><span class="gofitterserr"><?php echo $errroles; ?></span></div>
      </div>
    </div>


      <div class="form-group">
        <label for="firstname">First Name</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your First Name" value="<?php if(isset ($_POST['firstname'])){ echo $_POST['firstname'];}?>">
      </div>
       <span class="gofitterserr"><?php echo $errfn; ?></span>
      </div>

      <div class="form-group">
        <label for="lastname">Last Name</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your Last Name" value="<?php echo $_POST['lastname'];?>">
      </div>
       <span class="gofitterserr"><?php echo $errln; ?></span>
      </div>

      <div class="form-group">
        <label for="username">Username</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your preferred username" value="<?php echo $_POST['username'];?>">
      </div>
       <span class="gofitterserr"><?php echo $errusn; ?></span>
      </div>

      <div class="form-group">
        <label for="emailaddy">Email Address</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="email" name="emailaddy" id="emailaddy" class="form-control" placeholder="Enter your Valid Email" value="<?php echo $_POST['emailaddy'];?>">
      </div>
       <span class="gofitterserr"><?php echo $erremail; ?></span>
      </div>
     
      <div class="form-group">
      <label for="gender">Select your Gender</label>

      <div class="radio">
        <label>
          <input type="radio" name="gender" id="female" value="female" <?php if($_POST['gender']=='female'){echo "checked";}?>>
          Female
        </label>
      </div>

      <div class="radio">
        <label>
          <input type="radio" name="gender" id="male" value="male" <?php if($_POST['gender']=='male'){echo "checked";}?>>
          Male
        </label>
        <div><span class="gofitterserr"><?php echo $errgend; ?></span></div>
      </div>
    </div>

      <div class="form-group">
        <label for="nickname">Nickname(Optional)</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
        <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Enter a nickname unique to you alone" value="<?php echo $_POST['nickname'];?>">
      </div>
      <div><span class="gofitterserr"><?php echo $errnck; ?></span></div>
      </div>

      <div class="form-group">
        <label for="interests">Interests</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
        <input type="text" name="interests" id="interests" class="form-control" placeholder="Enter your sporting interests" value="<?php echo $_POST['interests'];?>">
      </div>
      <span class="gofitterserr"><?php echo $errintrst; ?>
      </div>

      <div class="form-group">
        <label for="date">Date Of Birth</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input type="Date" name="dateOfBirth" id="dateOfBirth" class="form-control" value="<?php echo $_POST['dateOfBirth'];?>">
      </div>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <input type="password" name="passwd" id="passwd" class="form-control" placeholder="Password should be at least 8 characters" value="<?php echo $_POST['passwd'];?>">
      </div>
      <span class="gofitterserr"><?php echo $errpass; ?>
      </div>

      <div class="form-group">
        <label for="confirmpass">Confirm Password</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <input type="password" name="confirmpass" id="confirmpass" class="form-control" placeholder="Enter same password as above" value="<?php echo $_POST['confirmpass'];?>">
      </div>
      <span class="gofitterserr"><?php echo $errcnpass; ?>
      </div>

      <div class="form-group">
        <span>By validating the form, you are agreeing to our <a href="#myModal" data-toggle="modal">terms of use.</a></span>
        <input type="reset" name="clearform" id="clearform" class="btn btn-primary" value="Clear Form">
        <input type="submit" name="submit" id="register" class="btn btn-success" value="Register">
       <!--  <span>By validating the form, you are agreeing to our <a href="#myModal" data-toggle="modal">terms of use.</a></span> --> 
      </div>

    </form>

      </div>    
    </div>
    </div>
  </div>


<?php include('footer.php');?>