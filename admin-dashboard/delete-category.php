<?php
include_once '../db-config/connection.php';
error_reporting(0);
session_start();
if(!isset($_SESSION['user'])){
	header('Location:login.php');
}
include_once 'header.php';
$category_id = $_GET['id'];
?>

<section>
		<div class="container content-section">
			<div class="row ml-1">
				<div class="col-xl-6 col-lg-6 col-md-6 col-10 m-auto">
		<?php
	
		$deletequery = "DELETE FROM category WHERE category_id = '$category_id' ";
		$delexecute = mysqli_query($con, $deletequery);
		if($delexecute){
			//header('location:category.php');
			echo "<div class='alert alert-success alert-dismissible'>
			<button type = 'button' class='close' data-dismiss='alert'> &times; </button>
			<strong>Success!</strong> Category deleted.
			</div>";
			?>
			<meta http-equiv="refresh" content="1;url='category.php'">
			<?php

		}
		else{
			echo "<div class='alert alert-danger alert-dismissible'>
			<button type = 'button' class='close' data-dismiss='alert'> &times; </button>
			<strong>Alert!</strong> Failed to delete.
			</div>";
		}

		?>
	</div>
		</div>
	</div>
</section>

<?php include_once 'footer.php'; ?>