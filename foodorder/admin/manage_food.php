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
		<h1>Manage Foods</h1>

		<br>
		<?php 
		if (isset($_SESSION['update'])) {
			echo $_SESSION['update'];
			unset($_SESSION['update']);
		}
		?>
		<?php 
		if (isset($_SESSION['failed-removed'])) {
			echo $_SESSION['failed-removed'];
			unset($_SESSION['failed-removed']);
		}
		?>
		<?php 
		if (isset($_SESSION['delete_success'])) {
			echo $_SESSION['delete_success'];
			unset($_SESSION['delete_success']);
		}
		?>
		<?php 
		if (isset($_SESSION['no-food-found'])) {
			echo $_SESSION['no-food-found'];
			unset($_SESSION['no-food-found']);
		}
		?>
		<?php 
		if (isset($_SESSION['inserted'])) {
			echo $_SESSION['inserted'];
			unset($_SESSION['inserted']);
		}
		?>
		<br>
<!-- Button to Admin-->
<a href="add_food.php" class="btn-primary">Add Food</a>
<br><br><br>
			<table class="tbl">
				<tr>
					<th>S_N</th>
					<th>Title</th>
					<th>Price</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Action</th>
				</tr>
				<?php 
				$i = 0;
				//create sql query get all food
				$sql = "SELECT * FROM `tbl_foods`";
				//Execute the query 
				$result = mysqli_query($con,$sql);
				//count Rows to check whether We have foods	 or not
				$count = mysqli_num_rows($result);
				//if count gatherthen Zero , we heave Foods else we donot have Foods
				if ($count>0) {
					//We have foods in database 

					while ($row=mysqli_fetch_array($result)) {
						$id = $row['Id'];
						$Title = $row['title'];
						$price = $row['price'];
						$image_name = $row['image_name'];
						$Featured = $row['feature'];
						$Active = $row['active'];
						$i++;
						?>

				<tr>
					<td ><?php echo $i;?></td>
					<td ><?php echo $Title;?></td>
					<td ><?php echo $price;?> Taka</td>
					<td>
						<?php 
						if ($image_name!="") {?>
							<img src="images/food/<?php echo $image_name;?>" width="90" height="60">

						<?php 
						}
						else
						{
						 echo "<div class='error'>image not added</div>";
						}
						?>
						
					</td>
					<td ><?php echo $Featured;?></td>
					<td ><?php echo $Active;?></td>
					<td>
						<a href="update_food.php?Id=<?php echo $id;?>" class="btn-secondary">update Admin</a>

						<a href="delete_food.php?food=<?php echo $id;?> &image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
						 
					</td>
				</tr>
					
					<?php
					}
				}
				else
				{
					//could not in database 
					echo "<tr><td colspan='7' class='error'>Food not Added Yet</td></tr>";
				}
				?>
				
				
			</table>

		<div class="clearfix"></div>
	</div>
	</div>
	<! -- Main content Section End -->

	<?php include("include/footer.php")?>

	<?php }?>