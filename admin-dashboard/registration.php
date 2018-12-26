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


	<!-- jQuery code for reading input control's value -->
	<script>
		$(document).ready(function(){
			$("#submitBtn").click(function(){
				var fName = $("#firstName").val();
				var lName = $("#lastName").val();
				var email = $("#email").val();
				var password = $("#password").val();
				var cpassword = $("#confirmPassword").val();
				var mob = $("#mobile").val();
				var city = $("#city").val();
				var address = $("#address").val();

				// AJAX code for passing data into another form for form handling 

				$.ajax({
						url: 'registration-val.php',
						type: 'POST',
						data: {firstname: fName, lastname: lName, email: email, pass: password, cpass: cpassword, mobile: mob, city: city, add: address},					
						success: function(data){
							$("#result").html(data);
						}
				});
			});
		});
	</script>


</head>
<body>
	<div class="bg">
		<div class="container pt-4">
		<h3 class="text-white text-center"><i class="fas fa-user-edit"></i> Register Here </h3>	
		<div class="wrapper">		
			<div class="row row-layout mt-4">				
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
					<label for="firstName">First Name</label>
						<input type="text" id="firstName" class="form-control" placeholder="First Name" required="">
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
					<label for="lastName">Last Name</label>
						<input type="text" id="lastName" class="form-control" placeholder="Last Name">
				</div>
			</div>
			<div class="row">				
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10 m-auto">
					<label for="email">Email</label>					
						<input type="email" id="email" class="form-control" placeholder="Email">					
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
					<label for="password">Password</label>					
						<input type="password" id="password" class="form-control" placeholder="Password">	
				</div>

				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
					<label for="confirmPassword">Confirm Password</label>					
						<input type="password" id="confirmPassword" class="form-control" placeholder="Password">
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
					<label for="mobile">Mobile No.</label>					
						<input type="phone" id="mobile" class="form-control" placeholder="Mobile No.">	
				</div>

				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
					<label for="city">City</label>					
						<input type="text" id="city" class="form-control" placeholder="City">
				</div>
			</div>
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-10 col-10 m-auto">
					<label for="address">Address</label>					
						<textarea id="address" class="form-control" rows="3" placeholder="Address"></textarea>
				</div>				
			</div>
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-10 col-10 m-auto">
					<input type="submit" id="submitBtn" class="btn btn-success btn-block">
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-8 col-10 m-auto">
					<span class="registered">Already Registered? <a href="login.php" class="text-warning text-center"> Login here</a> </span>
				</div>
			</div>
			<div class="row">
				<div id="result" name="result" class="col-xl-12 col-lg-12 col-md-12 col-10 col-10 m-auto">
					<?php
						// echo $result = $_GET['result'];
					?>
				</div>
			</div>

		</div> <!-- end wrapper -->
		</div>
	</div>
</body>
</html>