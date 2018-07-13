<?php include('header.php');?>


<!-- The second row starts here -->
	<div class="container-fluid backgrndimg">

		<p id="div2text"><b>This is the sample homepage for all about this web application</b></p>

	</div>
  <!-- The 3rd row starts here -->
   <div class="container div3row" style="">

		<div class="row iconrow">

			<div class="col-md-3 badgewrapper">
			<img src="icons/calendar1.png" alt="Manage seasons from the calendar" class="icons img-responsive">
      		<p class="servicetitle">Manager Events</p>
      		<p class="servicetext">Set dates of all your events and
      		seemlessly cascade to all members</p>
			</div>
			<div class="col-md-3 badgewrapper">
			 <img src="icons/graphs.png" alt="Get Analytics on your progress" class="icons img-responsive">
       <p class="servicetitle">Analytics</p>
      <p class="servicetext">All your sensor data from Google
        Fit can be seem on your dashboard</p>
      </div>
			
			<div class="col-md-3 badgewrapper">
			<img src="icons/megaphone.png" alt="Alerts sent to your personal profile" class="icons img-responsive">
      <p class="servicetitle">Notifications</p>
      <p class="servicetext">Send alerts to all members 
        before and after events.</p>
			</div>
			<div class="col-md-3 badgewrapper">
			<img src="icons/chat1.png" alt="Chat and share memories with season members" class="icons img-responsive">
      <p class="servicetitle">Relive Events</p>
      <p class="servicetext">Chat with members and
        share photos, memories and moments</p>	
			</div>
			
      </div>
		</div>
			

	</div>

		<!--Testimonial Section  -->
	<div class="container-fluid testimonialdiv" style="background-color: skyblue;">
	<div class="container divtestimonial">
		<div class="row">

		<?php 
		
			//select all info from sections table
          $sql = "select * from section where pageid='1' and sectionId='17'";
          $result = mysqli_query($con, $sql);

          if(!mysqli_query($con, $sql)) {
                echo "Error: ".mysqli_error($con);
              }

              //display the result in the div
              while($row = mysqli_fetch_assoc($result)){

         ?>


		<h3 style="text-align: center;"><?php echo $row['sectiontitle']; ?></h3>
		<div class="col-md-4 img-thumbnail">
		   <div class="col-md-offset-3 col-md-6 col-md-offset-3">
		   <img src="images/<?php echo $row['sectionimage'];  ?>" alt="Bob the football coach" class="testimonialimg img-responsive">	
		   </div>

		   <?php } ?>

		   <?php 
		
			//select all info from sections table
          $sql1 = "select * from section where pageid='1' and sectionId='23'";
          $result1 = mysqli_query($con, $sql1);

          if(!mysqli_query($con, $sql1)) {
                echo "Error: ".mysqli_error($con);
              }

              //display the result in the div
              while($row = mysqli_fetch_assoc($result1)){

         	?>


		   <div class="col-md-12 quotediv">
		   	<p><h3 style="text-align: center;"><?php echo $row['sectiontitle'];?></h3><br><h4>Team Principal, Drink Team (Rugby)</h4></p>
		   	<blockquote>
					<?php echo $row['sectionbody']; ?>		  		
		   	</blockquote>
		   </div>
			
			<?php } ?>
		</div>

		 <?php 
		
			//select all info from sections table
          $sql2 = "select * from section where pageid='1' and sectionId='24'";
          $result2 = mysqli_query($con, $sql2);

          if(!mysqli_query($con, $sql1)) {
                echo "Error: ".mysqli_error($con);
              }

              //display the result in the div
              while($row = mysqli_fetch_assoc($result2)){

         	?>



		<div class="col-md-4 img-thumbnail">
		 <div class="col-md-offset-3 col-md-6 col-md-offset-3">
		   <img src="images/<?php echo $row['sectionimage'];?>" alt="Obey the hiking coach" class="testimonialimg img-responsive">	
		</div>

		<div class="col-md-12">
		   	<p><h3 style="text-align: center;"><?php echo $row['sectiontitle']; ?></h3><br><h4>Team organizer, Shaku Team (Hiking)</h4></p>	
		   	<blockquote>
		   		<?php echo $row['sectionbody']; ?>
		   	</blockquote>
		</div>

			<?php } ?>
		</div>


		<?php 
		
			//select all info from sections table
          $sql3 = "select * from section where pageid='1' and sectionId='25'";
          $result3 = mysqli_query($con, $sql3);

          if(!mysqli_query($con, $sql3)) {
                echo "Error: ".mysqli_error($con);
              }

              //display the result in the div
              while($row = mysqli_fetch_assoc($result3)){

         	?>



		<div class="col-md-4 img-thumbnail">

		<div class="col-md-offset-3 col-md-6 col-md-offset-3">
		   <img src="images/<?php echo $row['sectionimage']; ?>" alt="Nanabell the atlethics coach" class="testimonialimg img-responsive">	
		</div>	

		<div class="col-md-12">
		   	<p><h3 style="text-align: center;"><?php echo $row['sectiontitle']; ?></h3><br><h4>Coach, Titans Team (Atlethics)</h4></p>	
		   	<blockquote>

		   		<?php echo $row['sectionbody']; ?>

		   	</blockquote>
		</div>
			<?php } ?>
		</div>		
	</div>
</div>
</div>

<?php include('footer.php');?>