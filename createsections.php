<?php 

$title = "| View Sections"; //must be at the top.
include('innerhead.php');

// var_dump($_SESSION);
?>

<div class="container-fluid">
	
	<!-- display all users -->
	<div class="row">

		<h2 style="text-align: center">Edit Pages Here</h2>
		
		<div class="col-md-12">
		<?php
		 if(isset($_GET['success'])){
		 	echo "<div class=alert alert-success> ".$_GET['success']." </div>";

		 } 

		 	?>
			<table class="table table-bordered table-hover table-striped">

				<thead style="background-color: tomato";>
					<tr>
					<th>Section ID</th>
					<th>Page ID</th>
					<th>Profile ID</th>
					<th>Section Body</th>
					<th>Section Image</th>
					<th>Section Title</th>
					<th>SubsectionTitle2</th>
					<th>Date created/Modified</th>
					<th>Action</th>
					</tr>
				</thead>

				<tbody>
						<?php
							//read and fetch info from sections table
							$query = "SELECT * from section ORDER BY sectionId DESC";
							$result = mysqli_query($con, $query);

							// var_dump($result);

							if(!mysqli_query($con, $query)) {
								echo "Error: ".mysqli_error($con);
							}

							//display the result in table row
							while($row = mysqli_fetch_assoc($result)){

							

						?>



					<tr>
						
						<td><?php echo $row['sectionId'] ?></td>
						<td><?php echo $row['pageId'] ?></td>
						<td><?php echo $row['profileId'] ?></td>
						<td><?php echo $row['sectionbody'] ?></td>
						<td><?php echo $row['sectionimage'] ?></td>
						<td><?php echo $row['sectiontitle'] ?></td>
						<td><?php echo $row['subsectiontitle2'] ?></td>
						<td><?php echo $row['datecreated'] ?></td>
						<td>
							<a href="editsection.php?id=<?php echo $row['sectionId'];?>">Edit</a>
							<a href="deletesection.php?id=<?php echo $row['sectionId'];?>">Delete</a>

						</td>

						
					</tr>
					<?php }?>
				</tbody>

				<tfoot>
					<tr>
					<th>Section ID</th>
					<th>Page ID</th>
					<th>Profile ID</th>
					<th>Section Body</th>
					<th>Section Image</th>
					<th>Section Title</th>
					<th>SubsectionTitle2</th>
					<th>Date created/Modified</th>
					<th>Action</th>
					</tr>

				</tfoot>
				
			</table>

		</div>

	</div>

</div>
