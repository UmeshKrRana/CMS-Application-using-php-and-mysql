<?php
	include_once 'header.php';
?>
 <article class="main border mt-5">
 	<?php $selquery = "SELECT * FROM post";
 		$myquery = mysqli_query($con, $selquery);
 		while ($row = mysqli_fetch_assoc($myquery)) {
 			$feat_img =  $row['featured_image'];
 			$description = $row['description'];

 			?>
 			<section class="pt-3 pb-3">
 				<a href="view-post.php?post_id=<?php echo $row['id'];?>" class="text-info"><h1> <?php echo $row['title']; ?>  </h1> </a>
 		</section>
 				<div class="row pb-5"> 

			    	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 m-auto">
			    		<img src="<?php echo "admin-dashboard/".$feat_img;?>" class="img-fluid">
			    	</div>

			    	<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 m-auto" style="font-weight:  inherit;">
			    		<?php $des_length = strlen($description);
			    			
			    			if($des_length>500){
			    				$description_post = substr($description, 0, 657);
			    				echo "<p style='font-weight: 200;'> ".$description_post . " [...] ";
			    			}
			    		 ?>
			    	</div>
    			</div>
    			<hr/>

 			<?php
 		}
   ?>
  </article> 
 <?php include_once 'footer.php'; ?>