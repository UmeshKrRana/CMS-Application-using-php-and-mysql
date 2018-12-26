<?php
	include_once '../db-config/connection.php';
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: login.php');
	}
	include_once 'header.php';
	$post_id = $_GET['post_id'];
	$delquery = "DELETE FROM post WHERE id = '$post_id'";
	$delexecute = mysqli_query($con, $delquery);
	if($delexecute){
		echo "<div class='col-xl-5 col-lg-5 col-md-5 col-sm-10 col-10 alert alert-success alert-dismissible m-auto'>
		<button type='button' class='close' data-dismiss='alert'>&times; </button>
		<strong>Success! </strong> Post deleted.</div>";
		// header('location: post.php');
		?>
			 <meta http-equiv="refresh" content="0;url='post'"> 
		<?php
	}
?>


<?php include_once 'footer.php'; ?>