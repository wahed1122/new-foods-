

<?php include("include/menu.php")?>
<?php 
	//Authoriztion Access Control
	//chack whether the user logged in or not
	if (!isset($_SESSION['user']))// if user it not login rediract to login page  
	{
		
		 echo "<script>window.open('login.php','_self')</script>";
	}else{



 ?>
	<! -- Main content Section Start -->
	<div class="main_content">
		<div class="b">
		<h1>Dashboard</h1>

		<div class="col-4 text_center">
			<?php 

			//Get the value  category table in database 
			$sql = "SELECT * FROM `tbl_category`";
			//Execute the query 
			$result = mysqli_query($con,$sql);
			//Count the all valu in category table 
			$count = mysqli_num_rows($result);

			?>
			<h1><?php echo $count ;?></h1>
			<br>
			<a href="manage_category.php">Category</a>
		</div>
		<div class="col-4 text_center">
			<?php 

			//Get the value  category table in database 
			$sql2 = "SELECT * FROM `tbl_foods`";
			//Execute the query 
			$result2 = mysqli_query($con,$sql2);
			//Count the all valu in category table 
			$count2 = mysqli_num_rows($result2);

			?>
			<h1><?php echo $count2 ;?></h1>
			<br>
			<a href="manage_food.php">Foods</a>
			
		</div>
		<div class="col-4 text_center">
			<?php 

			//Get the value  category table in database 
			$sql3 = "SELECT * FROM `tbl_order`";
			//Execute the query 
			$result3 = mysqli_query($con,$sql3);
			//Count the all valu in category table 
			$count3 = mysqli_num_rows($result3);

			?>
			<h1><?php echo $count3 ;?></h1>
			<br>
			<a href="manage_order.php">total order</a>
			
			
		</div>
		<div class="col-4 text_center">
			<?php 

			//Get the value  category table in database 
			$sql4 = "SELECT * FROM `tbl_admin`";
			//Execute the query 
			$result4 = mysqli_query($con,$sql4);
			//Count the all valu in category table 
			$count4 = mysqli_num_rows($result4);

			?>
			<h1><?php echo $count4 ;?></h1>
			<br>
			<a href="manage_admin.php">Admin</a>
			
			
		</div>

		<div class="clearfix"></div>
	</div>
	</div>
	<! -- Main content Section End -->

	<?php include("include/footer.php")?>
<?php } ?>
