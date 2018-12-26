<?php
	include_once('db-config/connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Blog | A Programming Solution </title>
	
	<!-- jQuery File -->
	<script type="text/javascript" src="admin-dashboard/jquery/jquery.js"></script>
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="admin-dashboard/css/bootstrap.min.css">
	
	<!-- Bootstrap JS -->
	<script type="text/javascript" src="admin-dashboard/js/bootstrap.min.js"></script>

	<!-- fontawesome icons css -->
	<link rel="stylesheet" type="text/css" href="admin-dashboard/fontawesome/css/all.css">

	<!-- Custom style  -->
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">

	<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Oswald');
.wrapper {
	 display: flex;  
 	 flex-flow: row wrap;		 
}

.wrapper > * {  
 	 flex: 1 100%;
}

.main {
  text-align: left;
  padding: 1em 2em;
  background: #fff;
}

@media all and (min-width: 600px) {
  .aside { flex: 1 0 0; }
}

@media all and (min-width: 800px) {
  .main    { flex: 3 0px; }
  .aside-1 { order: 1; } 
  .main    { order: 2; }
  .aside-2 { order: 3; }
  .footer  { order: 4; }
}

h1, h2, h3, h4, h5, h6{
	font-family: 'Oswald', sans-serif;
	
}
a{
	color: #007bff;
}
a:hover{
	
	text-decoration: none;
	
}

/* right sidebar style */

.sidebar-link{
	font-size: 14px;
	
}
a.sidebar-link:hover{
	text-decoration: underline;
}

#category{
	height: 55px;
	font-size: 16px;
}

.author{
	font-size: 14px;
	
}

#footer{
	background-color: #071220;
}
#footer-link{
	color: #2aa4cf;
}
#footer-link:hover{
	text-decoration: underline;
}

#footer-nav-item{
	border-bottom: 1px solid #333;
}

</style>

</head>
<body>



<div class="wrapper">
  <header class="header">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
			<a href="" class="navbar-brand">My Blog</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle Navigation" aria-expanded="false">
				<span class="navbar-toggler-icon" ></span>				
			</button>
			
			<div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav ml-auto">
			    	<li class="nav-item">
			    		<a class="nav-link active text-uppercase" href="#"> Home </a>
			    	</li>
			    	<?php
			    		$selquery = "SELECT * FROM header_menu";
			    		$executequery = mysqli_query($con, $selquery);
			    		while($row = mysqli_fetch_assoc($executequery)){
			    			?>
			    			<li class="nav-item">
			    				<a class="nav-link text-uppercase" href=<?php echo $row['menu_item'];?> " > <?php echo $row['menu_item'];?> </a>
			    			</li>

			    			<?php
			    		}

			    	?>
			    </ul>
			</div>
		</div>

	</nav>

</header>

</body>
</html>