<?php 

$title = "| View Users"; //must be at the top.
include('innerhead.php'); 

// var_dump($_GET);
?>

<div class="container-fluid">
	
	<!-- display all users -->
	<div class="row">
		<h2 style="text-align: center">****Signed Up Gofitters****</h2>
		
		<div class="col-md-12">
		<?php
		 if(isset($_GET['success'])){
		 	echo "<div class=alert alert-success> ".$_GET['success']." </div>";

		 } 

		 	?>
			<table class="table table-bordered table-hover table-striped">

				<thead>
					<tr>
					<th>Profile ID</th>
					<th>Lastname</th>
					<th>Firstname</th>
					<th>Username</th>
					<th>Nick Name</th>
					<th>Gender</th>
					<th>DoB</th>
					<th>Interests</th>
					<th>Email</th>
					<th>Role Name</th>
					<th>Action</th>
					</tr>
				</thead>

				<tbody>
						<?php
							//read and fetch info from users table
							$query = "SELECT profiles.*,rolename FROM profiles INNER JOIN roles ON profiles.roleId = roles.roleId";
							$result = mysqli_query($con, $query);

							if(!mysqli_query($con, $query)) {
								echo "Error: ".mysqli_error($con);
							}

							//display the result in table row
							while($row = mysqli_fetch_assoc($result)){

							

						?>



					<tr>
						
						<td><?php echo $row['profileId'] ?></td>
						<td><?php echo $row['lastname'] ?></td>
						<td><?php echo $row['firstname'] ?></td>
						<td><?php echo $row['username'] ?></td>
						<td><?php echo $row['nickname'] ?></td>
						<td><?php echo $row['gender'] ?></td>
						<td><?php echo $row['dateOfBirth'] ?></td>
						<td><?php echo $row['interests'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['rolename'] ?></td>
						<td>
							<a href="editprofile.php?id=<?php echo $row['profileId'];?>">Edit</a>
							<a href="delete.php?id=<?php echo $row['profileId'];?>">Delete</a>

						</td>

					</tr>
					<?php }?>
				</tbody>

				<tfoot>
					<tr>
					<th>Profile ID</th>
					<th>Lastname</th>
					<th>Firstname</th>
					<th>Username</th>
					<th>Nick Name</th>
					<th>Gender</th>
					<th>DoB</th>
					<th>Interests</th>
					<th>Email</th>
					<th>Role Name</th>
					<th>Action</th>
					</tr>
				</tfoot>
				
			</table>

		</div>

	</div>

</div>
