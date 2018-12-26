<?php
include_once('../db-config/connection.php');
session_start();
$user = $_SESSION['user'];   
$query = "SELECT * FROM admin_registration WHERE email = '$user' ";
$data = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($data);
$name = $row['first_name'] . " " . $row['last_name'];
error_reporting(0);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>

	<!-- JQuery file -->
	<script type="text/javascript" src="jquery/jquery.js"></script>
	
	<!-- Bootstrap JS File -->
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<!-- Bootstrap CSS File -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

	<!-- font family -->
	<link href="https://fonts.googleapis.com/css?family=Balthazar" rel="stylesheet">

	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="style/customstyle34.css">
	<link rel="stylesheet" type="text/css" href="style/contentstyle.css">

	<style type="text/css">
	.alert{
			font-size: 13px;
		}

	</style>
	
</head>
<body>
	<div class="wrapper">
		<nav id="sidebar">
			<div class="sidebar-header"> 
				<h6 class="text-uppercase" style="position: fixed;"> Admin Dashboard </h6>
			</div>
			<ul class="list-unstyled components">
				<li>
					<a href="../index.php" target="_blank">Visit homepage</a>
				</li>				
				<li>				
					<a href="#homeSubmenu">
					<span class="icon-area">
						<i class="fas fa-tachometer-alt"></i>
					</span>Dashboard </a>									
				</li>

				<li>
					<a href="#media" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<span class="icon-area">
							<i class="fas fa-file-alt"> </i>
						</span>
					Media </a>
					<ul class="collapse list-unstyled" id="media">
						<li>
							<a href=""> Library </a>
							<a href=""> Add New </a>
						</li>
					</ul>
				</li>

				<li>
					<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<span class="icon-area"><i class="fas fa-file"></i></span> Posts </a>
					<ul class="collapse list-unstyled" id="homeSubmenu1">
						<li>
							<a href="post"> All Post </a>
							<a href="add-post.php"> Add New </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#comments" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<span class="icon-area">
							<i class="fas fa-file-alt"> </i>
						</span>
					Pages </a>
					<ul class="collapse list-unstyled" id="comments">
						<li>
							<a href="">Add New </a>
							<a href="">All Pages </a>
						</li>
					</ul>
				</li>

				<li>
					<a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<span class="icon-area">
							<i class="fas fa-file-alt"> </i>
						</span>
					Category </a>
					<ul class="collapse list-unstyled" id="category">
						<li>
							<a href="add-category">Add New </a>
							<a href="category">Categories List </a>
						</li>
					</ul>
				</li>



				<li>
					<a href="#"><span class="icon-area"><i class="fas fa-comment"> </i></span> Comments </a>
				</li>

				<li>
					<a href="#appearance" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<span class="icon-area">
							<i class="fas fa-pen-fancy"> </i>
						</span>
					Appearance </a>
					<ul class="collapse list-unstyled" id="appearance">
						<li>
							<a href="menu">Menus </a>
							
						</li>
					</ul>
				</li>

				<li>
					<a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<span class="icon-area">
							<i class="fas fa-user-alt"> </i>
						</span>
					User </a>
					<ul class="collapse list-unstyled" id="user">
						<li>
							<a href="">All Users </a>
							<a href="">Add New </a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#dummy" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<span class="icon-area">
							<i class="fas fa-file-alt"> </i>
						</span>
					Pages Lists</a>
					<ul class="collapse list-unstyled" id="dummy">
						<li>
							<a href="">Add New </a>
							<a href="">All Pages </a>
						</li>
					</ul>
				</li>
			</ul>

			<ul class="list-unstyled CTAs">
				<li>
					<a href="#" class="download">Download Code </a>
				</li>
				<li>
					<a href="#" class="article">Article </a>
				</li>
			</ul>

		</nav>
		<!-- end navbar -->


		<!-- Top Navigation area -->
		<div class="content" style="z-index: 999;">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" >
				<button type="button" id="sidebarCollapse" class="btn btn-warning ml-5"> 
					<i class="fas fa-align-justify"> </i>
					<span>Toggle</span>
				</button>

				<a class="navbar-brand text-white ml-3 text-uppercase nav-text"> Admin Dashboard</a>

				  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav ml-auto text-right">
				         <li class="nav-item dropdown">
					        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          <i class="fas fa-bell"><span class="badge badge-pill badge-warning">3</span></i>
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="#">Notification 1</a>
					          <a class="dropdown-item" href="#">Notification 2</a>
					          <div class="dropdown-divider"></div>
					          <a class="dropdown-item" href="#">View All Notification</a>
					        </div>
					      </li>
					      <li class="nav-item dropdown">
					        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          <i class="fas fa-envelope"><span class="badge badge-pill badge-warning">3</span></i>
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="#">Message 1</a>
					          <a class="dropdown-item" href="#">Message 2</a>
					          <div class="dropdown-divider"></div>
					          <a class="dropdown-item" href="#">View All Messages</a>
					        </div>
					      </li>
					      <li class="nav-item dropdown">
					        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					          <i class="fas fa-bell"><span class="badge badge-pill badge-warning">3</span></i>
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="#">Notification 1</a>
					          <a class="dropdown-item" href="#">Notification 2</a>
					          <div class="dropdown-divider"></div>
					          <a class="dropdown-item" href="#">View All Notification</a>
					        </div>
					      </li>
				     
				    </ul>

				     <ul class="navbar-nav ml-auto text-right">
				         <li class="nav-item dropdown">
					        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $name; ?>
					         <span><i class="fas fa-user-circle"></i></span> 
					        </a>
					        <div class="dropdown-menu float-left profile-section" aria-labelledby="navbarDropdown">
					          <a class="dropdown-item" href="#">Settings</a>
					          <a class="dropdown-item" href="admin-profile">Profile</a>
					         
					          <a class="dropdown-item" href="logout">Logout</a>
					        </div>
					      </li>
				  </div>
</nav>  <!-- end top navigation area -->