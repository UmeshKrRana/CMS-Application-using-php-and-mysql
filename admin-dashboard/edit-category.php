<?php
include_once '../db-config/connection.php';
session_start();
error_reporting(0);
if(!isset($_SESSION['user'])){
	header('Location: login.php');
}
include_once 'header.php';
$category_id = $_GET['id'];	

$myquery = "SELECT * FROM category WHERE category_id = '$category_id' ";
$data = mysqli_query($con, $myquery);
$row = mysqli_fetch_assoc($data);
$parent_category = $row['parent_category'];

?>

	<div class="container content-section">			
		<form method="post">
			<div class="row  ml-1">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto shadow p-3">
					<label for="categoryname">Category Name</label>
					<div class="form-group">
						<input type="text" name="categoryname" id="categoryname" class="form-control form-control-sm" value="<?php echo $row['category_name'];?>">
					</div>
					<label for="parent-category">Parent Category </label>
					<div class="form-group">
						<select name="parent-category" id="parent-category" class="form-control form-control-sm">
							<option><?php echo $row['parent_category'];?></option>
							<?php
							$selcategory = "SELECT * FROM category WHERE parent_category !='$parent_category'";
							$mydata = mysqli_query($con, $selcategory);
							while($myrow = mysqli_fetch_assoc($mydata)){
								?>
								<option><?php echo $myrow['category_name'];?> </option>
								<?php
							}
							?>
							
						</select>
					</div>

					<label for="description">Category Name</label>
					<div class="form-group">
						<textarea name="description" id="description" class="form-control form-control-sm" rows="4"><?php echo $row['description'];?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="update" value="Update Category" class="btn btn-success btn-sm">
						<a href="category" class="btn btn-danger btn-sm"><i class="fas fa-fast-backward"></i> Back to Category</a>
					</div>


					<?php
					if(isset($_POST['update'])){
						 $name = $_POST['categoryname'];
						 $parent_category = $_POST['parent-category'];
						 $description = $_POST['description'];
					
						 $querycheck = "SELECT * FROM category WHERE category_name = '$name' and parent_category = '$parent_category' and description = '$description' ";
						 $thisdata = mysqli_query($con, $querycheck);
						 $thisrow = mysqli_fetch_assoc($thisdata);
						 $newcat = $thisrow['category_name'];
						 $newparent_cat = $thisrow['parent_category'];
						 $desc = $thisrow['description'];
						
						 if($newcat==$name && $newparent_cat==$parent_category && $description == $desc)
						 {
						 	echo "<div class='alert alert-danger alert-dismissible'>
						 	<button type='button' class='close' data-dismiss='alert'>&times; </button>
						 	<strong>Alert!</strong> No changes has been made.</div>";

						 }
						 else
						 {
						 	$updatequery = "UPDATE category SET category_name = '$name', parent_category = '$parent_category', description = '$description' WHERE category_id = '$category_id'";
						 	$update_execute = mysqli_query($con, $updatequery);
						 	if($update_execute){
						 		echo "<div class='alert alert-success alert-dismissible'>
						 		<button type='button' class='close' data-dismiss='alert'>&times;</button>
						 		<strong>Success! </strong>Category updated. </div>";
						 	}
						 }	
					}
					?>					
				</div>
			</form>
	</div>

</div>
<style type="text/css">
	.alert{
		font-size: 13px;
	}
</style>


<?php include_once 'footer.php';?>