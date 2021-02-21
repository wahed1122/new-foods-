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
		<h1>Manage Category</h1>

		<br>

		<?php 
		if (isset($_SESSION['no-catetory-found'])) {
			echo $_SESSION['no-catetory-found'];
			unset($_SESSION['no-catetory-found']);
		}
		if (isset($_SESSION['update'])) {
			echo $_SESSION['update'] ;
			unset($_SESSION['update'] );
		}
		if (isset($_SESSION['failed-removed'])) {
			echo $_SESSION['failed-removed'];
			unset($_SESSION['failed-removed']);
		}

		?>
		<br>
<!-- Button to Admin-->
<a href="add_category.php" class="btn-primary">Add Category</a>
<br><br><br>
			<table class="tbl">
				<tr>
					<th>S_N</th>
					<th>Image Title</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Action</th>
				</tr>
				<?php 
					$i = 0;
					$sql="SELECT * FROM `tbl_category`";
					$result=mysqli_query($con,$sql);
					while ($row=mysqli_fetch_array($result)) {
						$id = $row['Id'];
						$Title = $row['title'];
						$image_name = $row['image_name'];
						$Featured = $row['featured'];
						$Active = $row['active'];
						$i++;
					


				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $Title;?></td>
					<td>
						<?php 
						if ($image_name!="") {?>
							<img src="images/category/<?php echo $image_name;?>" width="90" height="60">

						<?php 
						}
						else
						{
						 echo "<div class='error'>image not added</div>";
						}
						?>
						
					</td>
					<td><?php echo $Featured?></td>
					<td><?php echo $Active?></td>
					<td>
						<a href="update_category.php?Id=<?php echo $id?>" class="btn-secondary">update Category</a>
						<a href="delete_category.php?Id=<?php echo $id?> &image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
						 
					</td>
				</tr>
				<?php }?>
			</table>

		<div class="clearfix"></div>
	</div>
	</div>
	<! -- Main content Section End -->

	<?php include("include/footer.php")?>

	<?php }?>