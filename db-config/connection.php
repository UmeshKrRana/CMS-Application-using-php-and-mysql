<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "blog";

	$con = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection error " .mysqli_connect_error());
?>