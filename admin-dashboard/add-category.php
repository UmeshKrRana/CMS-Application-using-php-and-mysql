<?php 

include_once('../db-config/connection.php');
error_reporting(0);
session_start();
if(!isset($_SESSION['user'])){
	header('Location:login.php');
}

include_once('header.php');

?>

	
		<div class="container content-section">
			
				<form method="post">
					<div class="row  ml-1">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto shadow p-3">
					<label for="categoryname">Category Name</label>
					<div class="form-group">
						<input type="text" name="categoryname" id="categoryname" class="form-control form-control-sm" placeholder="Category Name" required="">
					</div>
					<label for="parent-category">Parent Category </label>
					<div class="form-group">
						<select name="parent-category" id="parent-category" class="form-control form-control-sm">
							<option>None</option>
							<?php $myquery = "SELECT * FROM category";
							$data = mysqli_query($con, $myquery);
							while($row = mysqli_fetch_assoc($data)){
								?>
								<option><?php echo $row['category_name'];?> </option>
								<?php
							}
							?>
							
						</select>
					</div>

					<label for="description">Category Name</label>
					<div class="form-group">
						<textarea name="description" id="description" class="form-control form-control-sm" rows="4" placeholder="Description" required=""></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Add New Category" class="btn btn-success btn-sm">
						<a href="category" class="btn btn-danger btn-sm"><i class="fas fa-fast-backward"></i> Back to Category</a>
					</div>

					<?php
					if(isset($_POST['submit'])){
						 $name = $_POST['categoryname'];
						 $parent_category = $_POST['parent-category'];
						 $description = $_POST['description'];

						 $querycheck = "SELECT * FROM category WHERE category_name = '$name' ";
						 $mydata = mysqli_query($con, $querycheck);
						 $count = mysqli_num_rows($mydata);
						 if($count==1){
						 	echo "<div class='alert alert-danger alert-dismissible'>
						 	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						 	<strong>Alert!</strong> Category already exists.
						 	</div>";
						 }
						 else
						 {
						 	$query = "INSERT INTO category VALUES ('','$name','$parent_category','$description') ";
							$data = mysqli_query($con, $query);
							if($data){
								echo "<div class='alert alert-success alert-dismissible'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button>
								<strong>Success!</strong> New category added. 
								</div>";
							}
							else{
								echo "<div class='alert alert-danger alert-dismissible' >
								<button type='button' class='close' data-dismiss='alert'>&times;</button>
								<strong>Alert!</strong> Failed to save. 
								</div>";
							}
						}		
					}
					?>
					
				</div>
			</form>
			</div>

		</div>
	
	<style>
		
	</style>



<?php include 'footer.php'; ?>