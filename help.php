<?php 
$title = " | Help";
include('header.php');
include('gofittersfunctions.php');
;?>
 
 <?php
  if (isset($_POST['submit']) && $_POST['submit']=='Send') {
            //Variables declaration
            $firstname = gofitters_input($_POST['firstname']);
            $lastname = gofitters_input($_POST['lastname']);
            $email = gofitters_input($_POST['emailaddy']);
            $msg = gofitters_input($_POST['message']);
            
            //validate firstname
            if (empty($firstname)) {
                $errfstn = "Fast Name is required";
            }

            //validate lastname
            if (empty($lastname)) {
                $errlstn = "Last Name is required";
            }

            //validate email
            if (empty($email)) {
                $erremail = "Email field is compulsory";
            }elseif(!filter_var($username,FILTER_VALIDATE_EMAIL)){

                $erremail = "Invalid Email Address Format!";
            }

            //validate message
            if (empty($msg)) {
                $errmsg = "Kindly enter your message in the textbox above";
            }

            //check if there is no validation error and send the message.
            if ($errfstn =="" && $errlstn =="" && $erremail =="" && $errmsg =="") {

              $result = "Dear ".$firstname ." ".$lastname. ",your message has been sent successful <br/>";
              $result .= "Our agents will respond in less than 24hrs. Thank you";

                    echo $result;

            }

  }
 ?>




    <div class="container-fluid helpdiv">
    
    <div class="container">
      
      <div class="row">
        

        <div class="col-md-12" id="sectionicons">

          <h2 align="center" style="color: white"><strong>Help & Support</strong></h2>

          <div class="row">
            
            <div class="col-md-4">
              <a href="#Faq" class="helpicons">
              <section class="helpsection" id="faqsec">
              <span class="helpgly" id="faqgly"><i class="glyphicon glyphicon-question-sign"></i></span>

                <p>
                  <h4 style="color:#CA054D">Check our FAQ</h4>
                  Read through our commonly asked questions to answers to any of your enquiries.
                  
                </p>
              </section>
              </a>

            </div>

            <div class="col-md-4">
              <a href="#enquiryForm" class="helpicons">
              <section class="helpsection" id="sendsec">
                 <span class="helpgly" id="sendgly"><i class="glyphicon glyphicon-send"></i></span>

               <p>
                  <h4 style="color:#5D2E8C">Send Us your enquiries</h4>
                  Send your enquiries and we will surely revert back as best we can.
                  
                </p>
              </section>
              </a>


            </div>

            <div class="col-md-4">
              <a href="#contact" class="helpicons">
              <section class="helpsection" id="contactsec">
                 <span class="helpgly" id="phonegly"><i class="glyphicon glyphicon-phone-alt"></i></span>

               
                  <p>
                  <h4 style="color:#9E643C">Give Us a call</h4>
                  Call any of our customer care lines; we are always glad to hear from you.
                  
                </p>
              </section>
              </a>

            </div>
          </div>
          

        </div>

      </div>
               

    </div>

                

  </div>


    <!-- 3rd row for the FAQ info. -->

    <div class="container-fluid" id="helprow3">
    <div class="container"  id="helpdetails">
      <div class="row" id="faqdiv" >
        <div class="col-md-offset-4 col-md-4 col-md-offset-4" style="border-left: 2px solid #CA054D">

          <h3>FAQ</h3>
          
          <ol>
            <li>How do I sign up?</li>
            <li>Changing my password</li>
            <li>Recovering my password</li>
            <li>Payment failure details</li>
            <li>Refund policy</li>
            <li>How do I upgrade my subscription plan?</li>
            <li>How do I close my account?</li>
            <li>How do I recover my deleted messages?</li>
            <li>My account has been hacked.</li>

          </ol>



        </div>
      </div>
          <!-- 4th row for the send msg form -->
          <div class="row" id="sendform">
            
            <div class="col-md-offset-3 col-md-6 col-md-offset-3" style="border-left: 2px solid #5D2E8C ">

              <h3>Fill our enquiry form below:</h3>
              
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                  <label for="firstname">First Name</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your First Name" value="<?php echo $_POST['firstname'];?>">
                </div>
                <span class="gofitterserr"><?php echo $errfstn; ?></span>
                </div>

                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your Last Name" value="<?php echo $_POST['lastname'];?>">
                  </div>
                  <span class="gofitterserr"><?php echo $errlstn; ?></span>
                  </div>


                  <div class="form-group">
                  <label for="emailaddy">Email Address</label>
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" name="emailaddy" id="emailaddy" class="form-control" placeholder="Enter your valid email address" value="<?php echo $_POST['emailaddy'];?>">
                </div>
                <span class="gofitterserr"><?php echo $erremail; ?></span>
                </div>


                <div class="form-group">
                  <label for="message">Compile your message</label>
                  <div class="input-group">
               
                  <textarea class="form-control" id="message" rows="6" cols="90"></textarea>
                 
                </div>
                </div>

                  <input type="reset" name="clear" id="clear" class="btn btn-warning" value="Clear Form"> 
                  <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Send"> 

              </form>

            </div>

          </div>


          <!-- Contact numbers div -->

          <div class="row" id="contactdiv">
            
            <div class="col-md-offset-4 col-md-4 col-md-offset-4" style="border-left: 2px solid #9E643C">
              
              <p>
                <h3>Contact Our Hotlines</h3>

                <ul>
                  <li>+2348033291570</li>
                  <li>+443******</li>
                </ul>

              </p>


            </div>

          </div>


    </div>
  </div>

  <?php include('footer.php');?>

   <script type="text/javascript">
    
  $(document).ready(function(){

   //Onload only show FAQ.
  $('#faqdiv').show();
  $('#sendform').hide();
  // $('#sendsec').css('opacity','0.7');
  $('#contactdiv').hide();
  // $('#contactsec').css('opacity','0.7');

  //Onclick of FAQ hide the rest.
  $('#faqsec').click(function(){
  $('#faqdiv').show();
  $('#faqsec').css('opacity','1.0').css('border','2px solid #CA054D');
  $('#sendform').hide();
  $('#sendsec').css('opacity','0.7').css('border','0px');
  $('#contactdiv').hide();
  $('#contactsec').css('opacity','0.7').css('border','0px');
});

  //onclick of form button hide the rest.
  $('#sendsec').click(function(){

  $('#faqdiv').hide();
  $('#faqsec').css('opacity','0.7').css('border','0px');
  $('#sendform').show();
  $('#sendsec').css('opacity','1.0').css('border','2px solid #5D2E8C');
  $('#contactdiv').hide();
  $('#contactsec').css('opacity','0.7').css('border','0px');

  });

  //onclick of Contact button hide the rest.
  $('#contactsec').click(function(){

  $('#faqdiv').hide();
   $('#faqsec').css('opacity','0.7').css('border','0px');
  $('#sendform').hide();
  $('#sendsec').css('opacity','0.7').css('border','0px');
  $('#contactdiv').show();
  $('#contactsec').css('opacity','1.0').css('border','2px solid #9E643C');

  });

  }); 


  //Live chatting script

var __ac = {};
    __ac.uid = "715e1b97682e792bd27b46e19cdef184";
    __ac.server = "secure.chatrify.com";
    

    (function() {
    var ac = document.createElement('script'); ac.type = 'text/javascript'; ac.async = true;
    ac.src = 'https://cdn.chatrify.com/go.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ac, s);
    })();




  </script>