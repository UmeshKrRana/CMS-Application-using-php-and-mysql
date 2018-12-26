<?php
	include_once 'header.php';
	include_once 'db-config/connection.php';
	error_reporting(0);
	$post_id = $_GET['post_id'];
	$action = $_GET['action'];
?>

 <article class="main border mt-5"> 
	 	<?php 
	 		$selquery = "SELECT * FROM post WHERE id='$post_id'";
	 		$myquery = mysqli_query($con, $selquery);
	 		$row = mysqli_fetch_assoc($myquery); 
	 		$title = $row['title'];
	 		$category = $row['category'];
	 		$description = $row['description'];
	 		$tag = $row['tag'];
	 		$author = $row['author'];
	 		$date = $row['date'];
	 		$time = $row['time'];
	 		?>

	 		<!-- breadcrumb section -->

	 		<ol class="breadcrumb mt-5 bg-light">
			  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
			  <li class="breadcrumb-item active"><?php echo $title; ?></li>
			</ol>
	 		

	 		<h1 class="pt-4"> <?php echo $title; ?> </h1>
	 		<?php $month = array('Month','January','February', 'March', 'April', 'May', 'June', 'July', 'August', '	September', 'October', 'November', 'December');
	 			$monthstr = substr($date, 5, 2);
	 			$datestr = substr($date, 8, 2);
	 			$yearstr = substr($date, 0, 4);

	 			$post_date = $month[$monthstr] .' '.$datestr .', ' . $yearstr;
	 		?>
	 		<p class="text-secondary author"><?php echo $post_date;?> by <a href=""><?php echo $author; ?> </a> &mdash; 0 Comments</p>

	 		<?php echo $description; ?>
 </article>


<?php
	include_once 'footer.php';

?>