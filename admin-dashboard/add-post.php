<?php
include_once '../db-config/connection.php';
error_reporting(0);
session_start();
if(!isset($_SESSION['user'])){
	header('Location:login.php');
}
include_once 'header.php';
?>
	
	
<!-- Tags link -->
	<link rel="stylesheet" type="text/css" href="tags/src/jquery.tagsinput.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="tags/src/jquery.tagsinput.js"></script>
	<!-- To test using the original jQuery.autocomplete, uncomment the following -->
	
	<script type='text/javascript' src='http://xoxco.com/x/tagsinput/jquery-autocomplete/jquery.autocomplete.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://xoxco.com/x/tagsinput/jquery-autocomplete/jquery.autocomplete.css" />
	
 <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>


<!-- CK Editor -->
<link rel="stylesheet" type="text/css" href="ckeditor/styles.css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- <script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script> -->


<!-- Content Area started -->

<div class="container mb-5  pt-2 pb-5 " style="background: #fff; box-shadow: 0px 24px 94px 0px rgba(0,0,0,0.23);" >
	<form method="post" enctype="multipart/form-data">
		<h4 class="font-weight-bold mb-4 mt-2 ml-3">Add New Post </h4>
		<div class="row ml-1">
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 m-auto">
				<label for="post-title">Post Title</label>
					<div class="form-group">
						<input type="text" name="post-title" id="post-title" class="form-control form-control-sm" placeholder="Enter Post Title.." required="">
					</div>	
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<label for="post-title">Category</label>
					<div class="form-group">
						<select name="category" class="form-control form-control-sm">
							<option selected disabled>Select Category</option>
							<?php $selquery = "SELECT * FROM category ";
								$mydata = mysqli_query($con, $selquery);
								while($row = mysqli_fetch_assoc($mydata)){
									?>
									<option><?php echo $row['category_name']; ?>
									<?php
								}
							?>
						</select>
					</div>	
			</div>		
		</div>
		
		<div class="row ml-1">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10 m-auto">
				<label for="post-description">Description</label>
					<div class="form-group">
						<textarea name="post-description" id="post-description" class="form-control form-control-sm" placeholder="Enter Post Title.."></textarea>
					</div>
			</div>		
		</div>

		<div class="row ml-1 mb-5">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
				<label for="tagged">Tagged with</label>
					<input id='tags_3' name="tag" placeholder="Tagged with" type='text' class="tags form-control">
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
				<label for="featured-image">Featured Image</label>
					<input type="file" name="file" id="featured-image" class="form-control form-control-md" style="cursor: pointer;">
			</div>
		</div>

		<div class="row ml-3 mt-5 ">
			
				<input type="submit" name="submit" class="btn btn-success btn-md m-auto" value="Submit Post">
				<input type="submit" name="savedraft" class="btn btn-info btn-md m-auto" value="Save as Draft">
			
		</div>

		<div class="row ml-1 mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<?php
				if(isset($_POST['submit'])){
					$post_title = mysqli_escape_string($con, $_POST['post-title']);
					$post_description = $_POST['post-description'];
					$category = $_POST['category'];
					$tag = $_POST['tag'];

					$file_name = mysqli_escape_string($con, $_FILES['file']['name']);
					$file_size = $_FILES['file']['size'];
					$file_type = $_FILES['file']['type'];
					$file_tmp_loc = $_FILES['file']['tmp_name'];

					$file_store = "upload/".$file_name;

					// date and time
					$date = date('y-m-d');
					$time = date('h:m:s');

					if($post_title!="" && $post_description!=""){
						$checkQuery = "SELECT * FROM post WHERE title = '$post_title' ";
						$exeQuery = mysqli_query($con, $checkQuery);
						$countTitle = mysqli_num_rows($exeQuery);
						if($countTitle==1){
							echo "<div class='alert alert-danger alert-dismissible'>
							<button type='button' class='close' data-dismiss='alert'>&times; </button>
							<strong>Alert ! </strong> Post title already exists.
							</div>";
						}
						else
						{						
							move_uploaded_file($file_tmp_loc, $file_store);
								$sql = "INSERT INTO post VALUES ('','$post_title', '$category', '$post_description' , '$tag', '$file_store', '$name', '$date', '$time','1')";
							$data = mysqli_query($con, $sql);
							if($sql){
								echo "<div class='alert alert-success alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert'>&times; </button>
									<strong>Success! </strong> Post has been published.
									</div> ";
									}
							else{
								echo "<div class='alert alert-danger alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert'>&times; </button>
									<strong>Alert! </strong> Failed to published.
									</div> ";
								}
						}
			
					}
					else{
								echo "<div class='alert alert-danger alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert'>&times; </button>
									<strong>Alert! </strong> Fill the required details.
									</div> ";
						}
					}



				// code for save as draft

				if(isset($_POST['savedraft'])){
					$post_title = $_POST['post-title'];
					$post_description = $_POST['post-description'];
					$category = $_POST['category'];
					$tag = $_POST['tag'];

					$file_name = mysqli_escape_string($con, $_FILES['file']['name']);
					$file_size = $_FILES['file']['size'];
					$file_type = $_FILES['file']['type'];
					$file_tmp_loc = $_FILES['file']['tmp_name'];

					$file_store = "upload/".$file_name;

					// date and time
					$date = date('y-m-d');
					$time = date('h:m:s');

					if($post_title!="" && $post_description!=""){

						$checkQuery = "SELECT * FROM post WHERE title = '$post_title' ";
						$exeQuery = mysqli_query($con, $checkQuery);
						$countTitle = mysqli_num_rows($exeQuery);
						if($countTitle==1){
							echo "<div class='alert alert-danger alert-dismissible'>
							<button type='button' class='close' data-dismiss='alert'>&times; </button>
							<strong>Alert ! </strong> Post title already exists.
							</div>";
						}
						else
						{
							move_uploaded_file($file_tmp_loc, $file_store);
								$sql = "INSERT INTO post VALUES ('','$post_title', '$category', '$post_description' , '$tag', '$file_store', '$name', '$date', '$time','')";
							$data = mysqli_query($con, $sql);
							if($sql){
								echo "<div class='alert alert-success alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert'>&times; </button>
									<strong>Success! </strong> Post has been saved as draft.
									</div> ";
									}
							else{
								echo "<div class='alert alert-danger alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert'>&times; </button>
									<strong>Alert! </strong> Failed to saved.
									</div> ";
								}
						}
			
					}
					else{
								echo "<div class='alert alert-danger alert-dismissible'>
									<button type='button' class='close' data-dismiss='alert'>&times; </button>
									<strong>Alert! </strong> Fill the required details.
									</div> ";
						}
					}


				
				?>
			</div>
		</div>



	</form>
	<script>
			CKEDITOR.replace('post-description');
		</script>
</div>

<style type="text/css">
	label{
		font-size: 14px;
	}
	.cke_bottom{
		height: auto;
	}
</style>

<?php include_once 'footer.php';?>

<style type="text/css">
body{
	background: #f2f2f2; }
	div.tagsinput { border:1px solid #CCC; overflow-y: auto;}
}
div.tagsinput span.tag { border: 1px solid #a5d24a; -moz-border-radius:2px; -webkit-border-radius:2px; display: block; float: left; padding: 5px; text-decoration:none; background: #333; color: #fff !important; margin-right: 5px; margin-bottom:5px;font-family: helvetica;  font-size:13px;}
div.tagsinput span.tag a { font-weight: bold; color: #82ad2b; text-decoration:none; font-size: 11px;  } 
div.tagsinput input { width:80px; margin:0px; font-family: helvetica; font-size: 13px; border:1px solid transparent; padding:5px; background: transparent; color: #000; outline:0px;  margin-right:5px; margin-bottom:5px; }
div.tagsinput div { display:block; float: left; } 
.tags_clear { clear: both; width: 100%; height: 0px; }
.not_valid {background: #FBD8DB !important; color: #90111A !important;}

.alert{
	font-size: 13px;
}
</style>
<script type="text/javascript">

		function onAddTag(tag) {
			alert("Added a tag: " + tag);
		}
		function onRemoveTag(tag) {
			alert("Removed a tag: " + tag);
		}

		function onChangeTag(input,tag) {
			alert("Changed a tag: " + tag);
		}

		$(function() {
			
			$('#tags_3').tagsInput({
				width: 'auto',
				//autocomplete_url:'test/fake_plaintext_endpoint.html' //jquery.autocomplete (not jquery ui)
				autocomplete_url:'test/fake_json_endpoint.html' // jquery ui autocomplete requires a json endpoint
			});
		});

	</script>
	