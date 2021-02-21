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
		<h1>Manage Admin</h1>
		<br>

		
<!-- Button to Admin-->
<a href="add_admin.php" class="btn-primary">Add Admin</a>
<br><br><br>
			<table class="tbl">
				<tr>
					<th>S_N</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Action</th>
				</tr>

				<?php 
					$i = 0;
					$sql="SELECT * FROM `tbl_admin`";
					$result=mysqli_query($con,$sql);
					while ($row=mysqli_fetch_array($result)) {
						$id = $row['Id'];
						$full_name = $row['full_name'];
						$username = $row['username'];
						$i++;
					


				?>


				<tr>
					<td><?php  echo $i;?></td>
					<td><?php  echo $full_name;?></td>
					<td><?php  echo $username;?></td>
					<td>
						<a href="update_password.php?Id=<?php echo $id?>" class="btn-primary">Change Password</a>
						<a href="update_manage_admin.php?Id=<?php echo $id?>" class="btn-secondary">update Admin</a>
						<a href="delete_admin.php?Id=<?php echo $id?>" class="btn-danger">Delete Admin</a>
						 
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