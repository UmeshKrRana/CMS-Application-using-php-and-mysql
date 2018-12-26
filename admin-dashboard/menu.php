<?php
	include_once('../db-config/connection.php');
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: login.php');
	}
	include_once('header.php');
?>

<div class="container">
	<form method="post">
		<div class="row ml-1">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">
				<label for="menu-name">Menu Name</label>
					<div class="form-group">
						<input type="text" name="menu-name" id="menu-name" class="form-control form-control-sm" placeholder="Enter Menu Name">
					</div>

				<label for="menu-name">Add items to menu</label>
					<div class="form-group border">
						<?php
							$query ="SELECT * FROM category";
							$mydata = mysqli_query($con, $query);
							while ($row = mysqli_fetch_assoc($mydata)) {
								?>
								<input type="checkbox" name="menu[]" value="<?php echo $row['category_name']; ?>"> <?php echo $row['category_name']; ?>  <br/>
								 
								<?php
							}
						?>
					</div>

					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success btn-sm" value="Add to Menu">
					</div>
					<?php
					if(isset($_POST['submit'])){
						$menu_name = $_POST['menu-name'];
						$menu_item = $_POST['menu'];

						$checkquery = "SELECT * FROM menu ";
						$checkdata = mysqli_query($con, $checkquery);
						$myrow = mysqli_fetch_assoc($checkdata);
							$menuName = $myrow['menu_name'];
							$menuItem =  $myrow['menu_item'];	

							foreach ($menu_item as $menu) {	
												
							if($menuItem!=$menu){
								$sql = "INSERT INTO menu VALUES ('$menu_name', '$menu')";
								$myquery = mysqli_query($con, $sql);
							}

							else{
								echo "<div class='alert alert-danger alert-dismissible'>
								<button type='button' class='close' data-dismiss='alert'>&times;</button>
								<strong>Alert !</strong> Menu already exists.
								</div>";
							}
							}
						}
					?>
			</div>


			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10 m-auto">

					<table class="table">
						<thead>
							<tr>
								<th>Menu Name </th>
								<th>Menu Item </th>
								<th>Action </th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$mysqlquery = "SELECT DISTINCT menu_name, menu_item FROM menu ";
								$query = mysqli_query($con, $mysqlquery);
								while($myrow = mysqli_fetch_assoc($query)){
									?>
									<tr>
										<td> <?php echo $myrow['menu_name']; ?> </td>
										<td> <?php echo $myrow['menu_item']; ?> </td>
										<td> <a href="" class="badge badge-pill badge-success"> Edit </a>
											<a href="" class="badge badge-pill badge-danger"> Delete </a>
										</td>
									</tr>

									<?php
								}

							?>

						</tbody>
						<tfoot>
							
						</tfoot>
						
					</table>
			</div>

		</div>
	</form>
</div>
<style type="text/css">
	label{
		font-size: 13px;
	}
</style>
<?php include_once('footer.php'); ?>