<?php
include_once '../db-config/connection.php';
error_reporting(0);
session_start();
if(!isset($_SESSION['user'])){
	header('location:login.php');
}
include_once 'header.php';
?>
<script>
	$(document).ready(function(){
		$("#del").click(function(){
			if(!confirm("Do you want to delete?"))
				return false;
		})
	});
</script>
<div class="container">
	<div class="row mb-2 ml-2">
		<div class="col-xl-2 col-lg-2 col-md-2 col-sm-10 col-10 m-auto">
			<a href="add-post" class="btn btn-info btn-sm d-block"><i class="fas fa-plus-circle"></i> Add New Post </a>
		</div>

		<div class="col-xl-2 col-lg-2 col-md-2 col-sm-10 col-10 m-auto">
			<select name="" class="form-control form-control-sm">
				<option selected disabled> Select</option>
				<option value="delete">Delete </option>
			</select>			
		</div>

		<div class="col-xl-5 col-lg-5 col-md-5 col-sm-10 col-10 m-auto">
			<button class="btn btn-danger btn-sm"> Apply</button>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-3 col-sm-10 col-10 m-auto">
				<?php $countquery = "SELECT * FROM post";
					  $countexecute = mysqli_query($con, $countquery);
					  $totalpost = mysqli_num_rows($countexecute);
					  ?>
					  <br/>
				<p class="bg-warning text-dark pl-3" style="font-size: .9em;">Total <?php echo $totalpost; ?> posts found... </p>
			
		</div>
	</div>
	<table class="table table-hover ml-2" style="font-size: 14px; ">
		<thead class="bg-primary text-white">
			<tr>
				<td><input type="checkbox" name=""></td>
				<th><i class="fas fa-file-signature"></i> Post Title</th>
				<th><i class="fas fa-clipboard-list"></i> Category</th>
				<th><i class="fas fa-user"></i> Author</th>
				<th><i class="fas fa-calendar"></i> Date</th>
				<th><i class="fas fa-clock"></i> Time</th>
				<th><i class="fas fa-thermometer-half"></i> Status</th>
				<th><i class="fas fa-cogs"></i> Action  </th>
			</tr>
		</thead>
		<tbody>
			<?php $selquery = "SELECT * FROM post";
				$executequery = mysqli_query($con, $selquery);
				$count = mysqli_num_rows($executequery);
				if($count==0){
					echo "<div class='alert alert-danger alert-dismissible'>
					<button type='button' class='close' data-dismiss='alert'>&times; </button>
					<strong>Alert! </strong> No post is there.
					</div> ";
				}
				else{
					while ($row = mysqli_fetch_assoc($executequery)) {
						?>
						<tr>
							<?php $post_id = $row['id']; ?>
							<td><input type="checkbox" name=""></td>
							<td><a href="view-post.php?post_id=<?php echo $post_id;?> " class="text-info"><?php echo $row['title']; ?> </a></td>
							<td><?php echo $row['category']; ?> </td>
							<td><?php echo $row['author']; ?> </td>
							<td><?php echo $row['date']; ?> </td>
							<td><?php echo $row['time']; ?> </td>
							<td><?php $status = $row['status'];
							if($status==0){
								echo "Not Published";
							} 
							else{
								echo "Published"; }
								?> </td>

							<td><a href="edit-post.php?post_id=<?php echo $post_id; ?>" class="badge badge-success"><i class="fas fa-edit"></i> Edit </a>
								<a href="delete-post.php?post_id=<?php echo $post_id; ?>" class="badge badge-danger" onclick="return confirm('Do you want to delete?');"><i class="fas fa-trash"></i> Delete </a>
							</td>
						</tr>

						<?php
					}
				}
			?>
			
		</tbody>

		<tfoot class="bg-primary text-white">
			<tr>
				<td></td>
				<th> <i class="fas fa-file-signature"></i> Post Title</th>
				<th> <i class="fas fa-clipboard-list"></i> Category</th>
				<th> <i class="fas fa-user"></i> Author</th>
				<th> <i class="fas fa-calendar"></i> Date</th>
				<th> <i class="fas fa-clock"></i> Time</th>
				<th><i class="fas fa-thermometer-half"></i> Status</th>
				<th><i class="fas fa-cogs"></i> Action  </th>
			</tr>
		</tfoot>

	</table>

</div>

<style>
thead, tfoot{
	letter-spacing: 1px;
	box-shadow: 2px 3px 4px rgba(0, 0, 0, 0.1), 3px 4px 5px rgba(0, 0, 0, 0.2);
}
  td{
	cursor: pointer;
}
</style>

<?php include 'footer.php'; ?>