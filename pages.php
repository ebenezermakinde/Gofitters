<?php
$title = " | Create Page";
include ('innerhead.php'); 
include('gofittersfunctions.php');
?>





	<div class="container-fluid" id="homebg" >

		<div class="containter">

			<div class="col-md-offset-4 col-md-4 col-md-offset-4">

			<form id="signupform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>  ">

	

		
      <div class="form-group">
        <label for="pages">Enter Page Name</label>
        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" name="pages" id="pages" class="form-control" placeholder="Enter Page Name" value="<?php echo $_POST['pages'];?>">
      </div>
       <span class="gofitterserr"><?php echo $errfn; ?></span>
      </div>

      <div class="form-group">
                    	
                    	<input type="submit" name="submit" id="pages" class="btn btn-primary" value="Create Page">

                    </div>

         		</form>
         		</div>
      </div>


</div>
<?php include('innerfoot.php');?>