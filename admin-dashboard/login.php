<?php
include_once ('../db-config/connection.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form Using AJAX and jQuery in PHP</title>
	<!-- jQuery File -->
	<script type="text/javascript" src="jquery/jquery.js"></script>

	<!-- Bootstrap CSS File -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- Fontawesome File -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">

	<!-- Bootstrap JS File -->
	<script src="js/bootstrap.js" type="text/javascript"></script>

	<!-- Custom Style -->
	<link rel="stylesheet" type="text/css" href="style/login.css">
</head>

<body>
<div class="bg pt-5 pb-5">
		<div class="container pt-5 pb-5">
		<h3 class="text-white text-center"><i class="fas fa-sign-in-alt"></i> Login Here </h3>	
		<div class="wrapper pt-4 pb-5">		
			<form method="post"> 
			<div class="row row-layout mt-4">								
				<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 m-auto">
					<label for="email">Email</label>					
						<input type="email" id="email" name="email" class="form-control" placeholder="Email" required="">					
				</div>
			</div>
			<div class="row">				
				<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 m-auto">
					<label for="password">Password </label>					
						<input type="password" id="password" name="pass" class="form-control" placeholder="Password" required="">				
				</div>
			</div>
			<div class="row">				
				<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 m-auto">
						<input type="submit" id="loginBtn" class="btn btn-warning btn-block" placeholder="Password" value="Login">				
				</div>
			</div>

			<div class="row">				
				<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 d-block m-auto">
						<p class="text-center">New Student ? <a href="registration.php" class="text-success">Register Here </a></p>				
				</div>
			</div>

				<div class="row">				
				<div id="result" class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 d-block m-auto">
					<?php
					 $email = $_POST['email'];
					 $password = $_POST['pass'];

						if($email!="" && $password!=""){
							$myquery = "SELECT * FROM admin_registration WHERE email = '$email' ";
							$data = mysqli_query($con, $myquery);
							 $count = mysqli_num_rows($data);
							if($count==1){
								$mysqlquery = "SELECT * FROM admin_registration WHERE password = '$password' ";
								$mydata = mysqli_query($con, $mysqlquery);
								 $passcount = mysqli_num_rows($mydata);
								if($passcount==1){
									echo "<span class='text-success'> Login success</span>";

									// creating php session

									session_start();
									 $_SESSION['user'] = $email;
									
									// redirecting to the next page with session
									header('Location: index.php');
									?>
									

									<!-- <meta http-equiv="refresh" content="2;url='index.php' "> -->

									<?php
								}
								else{
									echo "<span class='text-warning text-center'>Password is incorrect. </span>";
								}
							}
							else{
								echo "<span class='text-warning text-center'>Email is incorrect. </span>";
							}
						}
					?>
				</div>
			</div>
		</form>
	</div>  <!-- end wrapper class -->
</div>

</body>
</html>