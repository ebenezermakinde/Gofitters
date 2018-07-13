<?php
  if($con){
  mysqli_close($con);
  }
?>


 <!-- Site Info. & contacts of the site -->
  <div class="container-fluid" style="background-color: tomato; color: white">
  	<div class="container">
  	<div class="row">
  		
  	<div class="col-md-3">
  		<ul class="footerlist">
        <li>English(en)</li>
        <li>Arabic(ar)</li>
        <li>Francais(fr)</li>
      </ul>
  	</div>
  	<div class="col-md-3">
  		<span class="contactinfoheading">About GoFitters</span>
      <ul class="footerlist">
        <li><a href="" class="footlink">About us</a></li>
        <li><a href="" class="footlink">blog</a></li>
        <li><a href="pages/termsofuse.php" class="footlink">Terms of use</a></li>
      </ul>
  	</div>
  	<div class="col-md-3">
  		<span class="contactinfoheading">Do you have any questions?</span>
      <ul class="footerlist">
        <li><a class="footlink" href="help.php#Faq">
          <i>
              <i class="fa fa-question-circle"></i>
            FAQ
          </i>
        </a>
        </li>

        <li><a class="footlink" href="#">
          <i>
              <i class="fa fa-envelope"></i>
            Send us an email
          </i>
        </a>
        </li>

        <li>
          <i>
              <i class="fa fa-phone"></i>
            +2348033291570
          </i>
        </a>
        </li>
      </ul>
  	</div>
  	<div class="col-md-3">
  		<span class="contactinfoheading">Features</span>
      <ul class="footerlist">
        <li>Create a community of like minded enthusiast</li>
        <li>Manage time effectively</li>
        <li>Achieve your fitness goals in a fun way</li>
        <li>Share those special moments</li>
        <li>Document all your goals & achievements</li>
      </ul>
  	</div>

  	</div>

  	</div>
  </div>



  <!-- Footer for Social Media -->
  <div class="container-fluid footer">
  	<div class="container">
  	<div class="row">
  	<div class="col-md-12"> <h5 id="followus">Follow us on</h5></div>	
  	</div>
  	</div>
  	<div class="container">
  	<div class="row">
  		
  	<div class="col-md-3">
  	<a href=""><img src="icons/facebook.png" alt="follow us on facebook" class="img-responsive socialicons floatleft"></a>
  	 <p class="socialpara">Facebook</p>
  	 <p class="clearfloat"></p>
  	</div>
  	<div class="col-md-3">
  	 <a href=""><img src="icons/Twitter.png" alt="follow us on twitter" class="img-responsive socialicons floatleft"></a>
  	 <p class="socialpara">Twitter</p>
  	 <p class="clearfloat"></p>
  	</div>
  	<div class="col-md-3">
  	<a href=""><img src="icons/linkedin.png" alt="follow us on linkedin" class="img-responsive socialicons floatleft"></a>
  	<p class="socialpara">LinkedIn</p>
  	<p class="clearfloat"></p>
  	</div>
  	<div class="col-md-3">
  	<a href=""><img src="icons/Instagram.png" alt="follow us on Instagram" class="img-responsive socialicons floatleft"></a>
  	<p class="socialpara">Instagram</p>
  	<p class="clearfloat"></p>
  	</div>

  	</div>

  	</div>
  </div>

   <!-- Copyright footer -->

   <div class="container-fluid footer">
   	<div class="container">
   		
   		<div class="row">
   			<div class="col-md-12">
   				
   			<!-- <img src="icons/Gofitters.png" alt="GoFitters logo" class="iconfooter img-responsive"> -->	
   			</div>
   		</div>
       
       <div class="row">
       	
       	<div class="col-md-12">
       		<h5 style="text-align: center;">Copyright &copy; 2018 - GoFitters. All Rights Reserved</h5>
       	</div>

       </div>

   	</div>

   </div>

<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.twbsPagination.js"></script>    

 <script type="text/javascript">
$(document).ready(function(){

  //On load properties.
  $('#homemenu').addClass('active');
  $('.buttonjoin').hide();

 
//Show Password function
$('#revealpass').click(function(){

  //Password Toggle using the tenary operator. 
  $('#revealpass').is(':checked') ? $('#passwd').attr("type","text") : $('#passwd').attr("type","password");


      });


//Team Toggle button function.
 $('.toggleicon').click(function () {
                $(this).parent().next().toggle(500);
            });

            // $('.hidden').hide()


});


</script> 

</body>
</html>