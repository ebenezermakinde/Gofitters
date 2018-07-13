<?php 
  $title = " | Log In";
  include('header.php');
  include('gofittersfunctions.php');

  if($_SERVER['REQUEST_METHOD']=='POST'){
  

    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";
  
  //Validating the user-input
  $usernamerr="";
  $passwderr="";


  if(empty ($_POST['email'])){
       $usernamerr ="The username field is required";
       }elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $usernamerr="Invalid Email Address";
      }else{
        $username = gofitters_input($_POST['email']);
        
      }

      if(empty($_POST['passwd'])){
        $passwderr= "The password field is required";
      }else{
        $password = gofitters_input($_POST['passwd']);
        
        
      }

          //check if username and password is valid
        if ($usernamerr=='' &&  $passwderr==''){

          $mypassword = md5($password);
          //SQL to check if login credentials are valid.
          $gofitsql = "SELECT profiles.*, roles.rolename FROM profiles LEFT JOIN roles ON profiles.roleId = roles.roleId WHERE 
          profiles.email='$username' AND profiles.password='$mypassword' LIMIT 1";


           if (!mysqli_query($con,$gofitsql)) {
            echo "ERROR: ".mysqli_error($con);
          }else{

            $gofitresult = mysqli_query($con,$gofitsql);
            $gofitrow = mysqli_fetch_array($gofitresult);

            // var_dump($row);
            // echo "<pre>";
            // print_r($gofitrow);
            // echo "</pre>";

            if(mysqli_num_rows($gofitresult)==1){
              //create session variables
              $_SESSION['profileId'] = $gofitrow['profileId'];
              $_SESSION['lstname'] = $gofitrow['lastname'];
              $_SESSION['fstname'] = $gofitrow['firstname'];
              $_SESSION['gender'] = $gofitrow['gender'];
              $_SESSION['usrname'] = $gofitrow['username'];
              $_SESSION['nckname'] = $gofitrow['nickname'];
              $_SESSION['email'] = $gofitrow['email'];
              $_SESSION['intrst'] = $gofitrow['interests'];
              $_SESSION['roleid'] = $gofitrow['roleId'];
              $_SESSION['profileimage'] = $gofitrow['profileimage'];
              $_SESSION['rolename'] = $gofitrow['rolename'];
              $_SESSION['_Toyin'] = "kiitan";
              
              //redirect to home page
              header("Location: http://localhost/gofitters/home.php");

            }else{
              $error3 = "<span class='gofitterserr alert alert-danger'>Invalid username or password</span>";
            }
          }




        }


}

  ?>
      
      <div class="container-fluid" id="signinbg">
     <div class="container">
      <div class="row">
        <!-- Success message displays here after successful registration -->
      <span>
    <?php
     if(isset($_GET['success'])){
      echo "<div class=alert alert-success> ".$_GET['success']." </div>";

     } 

      ?>
      </span>
        <div class="col-md-offset-6 col-md-6">
           <h3 class="labellogin" id="loginheading">Sign in here</h3>
        </div>
      </div>
       
       <div class="row">
         <div class="col-md-offset-6 col-md-6">
          <!-- The signin form starts here -->
          <?php; if(isset($error3)){echo $error3;} ?>
           <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
             <div class="form-group">
               <label for="email" class="labellogin">Email</label>
               <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input type="email" name="email" id="email" class="form-control" placeholder="Enter your valid username" value="<?php echo $_POST['email']?>">
               </div>
               <span class="gofitterserr"><?php echo $usernamerr?></span>
             </div>


        <div class="form-group">
             <label for="password" class="labellogin">Password</label>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" name="passwd" id="passwd" class="form-control" placeholder="Enter your valid password" value="<?php echo $_POST['passwd']?>">
              <span class="input-group-addon"><a href="#"><i class="glyphicon glyphicon-eye-open" id="revealpass1"></i></span></a>
            </div>
            <input type="checkbox" name="revealpass" id="revealpass" value=""><span style="color: black">Show Password</span>
            <span class="gofitterserr"><?php echo $passwderr?></span>
        </div>

              <input type="reset" name="btnclear" id="btnclear" class="btn-lg btn btn-primary" value="Clear Form">
              <input type="submit" name="btnsend" id="btnsend" class="btn-lg btn btn-success" value="Login">
               <h4 id="logresetbtn">Forgot your password?<a href="#">Reset</a></h4>

           </form>
         </div>

       </div>

     </div>
     </div>

<?php include('footer.php');?>






 