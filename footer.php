 <aside class="aside aside-2 mt-5">
  	<section class="pt-5 pl-4 pr-4">
  		<h6 class="text-uppercase pb-3">Popular Posts </h6>
  			<?php $query = "SELECT * FROM post";
  			$myquery = mysqli_query($con, $query);
  			while($row = mysqli_fetch_assoc($myquery)){
  				?>
  				<a href="" class="text-info sidebar-link"><?php echo $row['title']; ?> </a> 
  				<hr/>
  				<?php
  			}
  			
  			?>
  	</section>
  	<section class="pt-5 pl-4 pr-4">
  		<h6 class="text-uppercase pb-3">Recent Posts </h6>
  			<?php $query = "SELECT * FROM post";
  			$myquery = mysqli_query($con, $query);
  			while($row = mysqli_fetch_assoc($myquery)){
  				?>
  				<a href="" class="text-info sidebar-link"><?php echo $row['title']; ?> </a> 
  				<hr/>
  				<?php
  			}
  			
  			?>
  		
  	</section>

  	<section class="pt-5 pl-4 pr-4">
  		<h6 class="text-uppercase pb-3">Categories </h6>
  			<select name="category" id="category" class="form-control">
  				<option >Select Category</option>
  				<?php 
  					$queryforcategory = "SELECT * FROM category";
  					$executecategory = mysqli_query($con, $queryforcategory);
  					while ($categoryName = mysqli_fetch_assoc($executecategory)) {
  						?>
  							<option id="option"><?php echo $categoryName['category_name'];?> </option>
  						<?php
  					}
  				?>
  				
  			</select>
  		
  	</section>
  	
</aside>


<footer id="footer" class="footer text-white p-5">
	<div class="container">
		<div class="row">
			<div class="container"><h5>About</h5> </div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.  </p>


			</div>

			
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<h6> Quick Navigation </h6>
				<ul class="navbar-nav">
						<li class="nav-item" id="footer-nav-item">
							<a href="" id="footer-link" class="nav-link" >About </a>
						</li>
						<li class="nav-item" >
							<a href="" id="footer-link" class="nav-link">About </a>
						</li>
				</ul>

				<h6 class="pt-5"> Quick Navigation </h6>
				<ul class="navbar-nav">
						<li class="nav-item" id="footer-nav-item">
							<a href="" id="footer-link" class="nav-link" >About </a>
						</li>
						<li class="nav-item" >
							<a href="" id="footer-link" class="nav-link">About </a>
						</li>
				</ul>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-10 m-auto">
				<h6> Subscribe our Newsletter</h6>
			</div>
		</div>
	</div>

</footer>

</div>