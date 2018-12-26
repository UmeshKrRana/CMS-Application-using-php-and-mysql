<?php
include_once('../db-config/connection.php');
error_reporting(0);
// echo "hello programmer";
	 $firstname = $_POST['firstname'];
	 $lastname = $_POST['lastname'];
	 $email = $_POST['email'];
	 $password = $_POST['pass'];
	 $cpassword = $_POST['cpass'];
	 $mob = $_POST['mobile'];
	 $city = $_POST['city'];
	 $address = $_POST['add'];

	if(($firstname=="") || ($lastname=="") || ($email=="") || ($password=="") || ($cpassword =="") || ($mob == "") || ($city == "") || ($address=="")){
	 		echo " <span class='text-warning text-center'> Fill all the details </span> ";	 		
	 }
	 else
	 {
	 	if($password!=$cpassword){
	 		echo "<span class='text-warning text-center'> Password not confirmed. </span> ";
	 	}
	 	else{
	 		$sqlquery = "SELECT * FROM admin_registration WHERE email = '$email'";
	 		$query = mysqli_query($con, $sqlquery);
	 		$total = mysqli_num_rows($query);
	 		
	 		if($total==0){
	 			$sqlInsert = "INSERT INTO admin_registration VALUES ('$firstname', '$lastname', '$email', '$password', '$mob', '$city', '$address') ";
	 			$sqlexecute = mysqli_query($con, $sqlInsert);	 			

	 			$sqlInsert2 = "INSERT INTO admin_profile VALUES ('$firstname', '', '$lastname', '$email', '$mob', '$city', '$address','')";
	 			$sqlInsertExecute = mysqli_query($con, $sqlInsert2);

	 			if($sqlexecute && $sqlInsertExecute){
	 				echo "<span class='text-success'> Registration completed.</span>";
	 			}
	 			else{
	 				echo "<span class='text-warning'> Failed to register. Try again. </span>";
	 			}

	 		}
	 		else{
	 			echo "<span class='text-warning'>Email already registered. Try with different email address.</span>";
	 		}

	 	}
	 }
	
	 	

?>