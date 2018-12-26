<?php
	include_once('../db-config/connection.php');
	error_reporting(0);
	session_start();

	if(!isset($_SESSION['user'])){
		header('location: login.php');
	}
	include_once('header.php');
	$email = $_SESSION['user'];

	$mysql = "SELECT * FROM admin_profile WHERE email = '$email'";
	$data = mysqli_query($con, $mysql);
	$rowdata = mysqli_fetch_assoc($data);
?>


<div class="container pb-5" style="background-color: #fff; box-shadow: 0px 24px 94px 0px rgba(0,0,0,0.23);">
		<h4 class="font-weight-bold ml-4 pt-4"> Admin Profile </h4>
	<form method="post" enctype="multipart/form-data">
		<div class="row ml-1 mt-4 pt-4 pb-4">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<label for="firstname">First Name </label>
					<input type="text" class="form-control form-control-sm" name="firstname" id="firstname" value="<?php echo $rowdata['first_name']; ?>">
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<label for="middlename">Middle Name </label>
					<input type="text" class="form-control form-control-sm" name="middlename" id="middlename" value="<?php echo $rowdata['middle_name']; ?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<label for="lastname">Last Name </label>
					<input type="text" class="form-control form-control-sm" name="lastname" id="lastname" value="<?php echo $rowdata['last_name']; ?>">
			</div>
		</div>

		<div class="row ml-1">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<label for="email">E-mail</label>
					<input type="email" disabled name="email" id="email" class="form-control form-control-sm" value="<?php echo $rowdata['email'];?>">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<label for="phone">Phone</label>
					<input type="phone" name="phone" id="phone" class="form-control form-control-sm" value="<?php echo $rowdata['mobile'];?>">
			</div>

			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<label for="city">City</label>
					<input type="text" name="city" id="city" class="form-control form-control-sm" value="<?php echo $rowdata['city'];?>">
			</div>
		</div>

		<div class="row ml-1">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
				<label for="address"> Address</label>
					<textarea class="form-control" name="address" id="address"><?php echo $rowdata['address'];?> </textarea>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
				<label for="file"> Profile Picture</label>
					<input type="file" name="file" id="file" class="form-control form-control-md">
			</div>
		</div>

		<div class="row ml-1">

			<div class="col-lg-4 offset-7 col-sm-10 col-10 m-auto">
				<img class="img-fluid" style="height: 200px; width: 250px;" src="<?php echo $rowdata['profile_img']; ?>">
			</div>
		</div>

		<div class="row ml-4 mt-5">
			<input type="submit" name="submit" value="Update Profile" class="btn btn-success btn-sm">
		</div>

		<div class="row ml-4 mt-4">
		<?php
		if(isset($_POST['submit'])){
			 $firstname = $_POST['firstname'];
			 $middlename = $_POST['middlename'];
			 $lastname = $_POST['lastname'];
			 $phone = $_POST['phone'];
			 $city = $_POST['city'];
			 $address = $_POST['address'];

			 $file_name = $_FILES['file']['name'];
			 $file_type = $_FILES['file']['type'];
			 $file_size = $_FILES['file']['size'];
			 $file_tmp_loc = $_FILES['file']['tmp_name'];

			 $file_store = "upload/".$file_name;
			 // echo $email = $_SESSION['user'];

			 
			 	if(!empty($_FILES['file']['name'])){
				move_uploaded_file($file_tmp_loc, $file_store);
				$query2 = "UPDATE admin_profile SET first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname', mobile = '$phone', city = '$city', address = '$address', profile_img = '$file_store' WHERE email = '$email'";
				$mydata = mysqli_query($con, $query2);
				if($mydata){
					echo "<div class='col-md-5 alert alert-success alert-dismissible'>
					<button type='button' class='close' data-dismiss='alert'>&times; </button>
					<strong>Success ! </strong> Profile Updated. </div>";
				}
				else
				{
					echo "<div class='col-md-5 alert alert-danger alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert'>&times; </button>
						<strong> Alert !</strong> Failed to update. </div>";
				}
			}
			else{
				$sqlquery2 = "UPDATE admin_profile SET first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname', mobile = '$phone', city = '$city', address = '$address' WHERE email = '$email' ";
				$myrowdata = mysqli_query($con, $sqlquery2);
				if($myrowdata){
					echo "<div class='col-md-5 alert alert-success alert-dismissible'>
					<button type='button' class='close' data-dismiss='alert'>&times; </button>
					<strong>Success ! </strong> Profile Updated. </div>";
				}
				else
				{
					echo "<div class='col-md-5 alert alert-danger alert-dismissible'>
						<button type='button' class='close' data-dismiss='alert'> &times; </button>
						<strong> Alert !</strong> Failed to update. </div>";
				}
			}	
		}
				

			

			

		?>
	</div>

	</form>
</div>
<style type="text/css">
	label{
		font-size: 13px;
	}
</style>


<?php include_once 'footer.php'; ?>
