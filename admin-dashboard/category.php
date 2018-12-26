<?php
include_once '../db-config/connection.php';
error_reporting(0);
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
}
include_once 'header.php';
?>

<script>
$(document).ready(function(){
	$("#del").click(function(){
		if(!confirm("Do you want to delete?"))
			return false;
	});
});

</script>

<section>
		<div class="container content-section">
			<div class="row ml-1">
				<a href="add-category" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"> Add New Category</i> </a>
			</div>

			<div class="row border-top mt-3 ml-1 mt-2 p-2 font-weight-bold">
				<div class="col-xl-1 col-lg-1 col-md-2 col-sm-1 col-1"> Id </div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"> Name  </div>
				<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4"> Parent Category  </div>
				<div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-3"> Description  </div>
				<div class="col-xl-3 col-lg-3 col-md-2 col-sm-1 col-2"> Action </div>
			</div>

			<?php
				$myquery = "SELECT * FROM category";
				$data = mysqli_query($con, $myquery);
				while($row = mysqli_fetch_assoc($data)){
				?>
					<div class="row border-top ml-1 mt-2 p-2">
						<div class="col-xl-1 col-lg-1 col-md-2 col-sm-1 col-1">
							<?php echo $row['category_id'];?>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2"">
							<?php echo $row['category_name'];?>
						</div>
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4">
							<?php echo $row['parent_category'];?>
						</div>

						<div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-3">
							<?php $description = substr($row['description'], 0, 50);
								 if(strlen($description)==50)
								 {
								 	echo $description ."...";
								 }
								 else
								 {
								 	echo $description;
								 }
							?>
						</div>

						<div class="col-xl-3 col-lg-3 col-md-2 col-sm-1 col-2">
							
									<a href="edit-category.php?id=<?php echo $row['category_id'];?>" class="badge badge-pill badge-success">Edit</a>
									<a id="del" href="delete-category.php?id=<?php echo $row['category_id'];?> " class="badge badge-pill badge-danger" onclick="return confirm('Do you want to delete?');">Delete</a>
						</div>

					</div>
				<?php
				}
				?>

</div>
</section>
<style type="text/css">
	.row{
		font-size: 14px;
	}
</style>


<?php include_once 'footer.php';

