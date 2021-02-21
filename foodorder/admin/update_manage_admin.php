<?php include("include/menu.php")?>
<?php 
	//Authoriztion Access Control
	//chack whether the user logged in or not
	if (!isset($_SESSION['user']))// if user it not login rediract to login page  
	{
		
		 echo "<script>window.open('login.php','_self')</script>";
	}else{



 ?>

<?php 
	//get admin id
	$update_admin=$_GET['Id'];
	//select get admin information
	$get_admin="SELECT * FROM `tbl_admin` WHERE `Id`='$update_admin'";
	//query connection 
	$run_admin = mysqli_query($con,$get_admin);
	//fatch admin information 
	$row_admin_update=mysqli_fetch_array($run_admin);
	$full_name = $row_admin_update['full_name'];
	$username = $row_admin_update['username'];

?>

<div class="main_content">
		<div class="b">
		<h1>Update Admin</h1>
		<br>
<form action="" method="post"  >
	<label class="label">Full Name</label>
	<input type="text" class="control" name="full_name" value="<?php echo $full_name ;?>" required="">
	<br>
	<label class="label">User Name</label>
	<input type="text" class="control" name="user_name" value="<?php echo $username ;?>" required="">
	<br>
	
	<input type="submit" class="btn-primary primary " name="update" value="Update" required="">
</form>
<div class="clearfix"></div>
</div>
</div>

<?php include("include/footer.php")?>


 <?php 

if(isset($_POST['update'])){
	 $full_name=$_POST['full_name'];
	 $user_name=$_POST['user_name'];
	 

	$query="UPDATE `tbl_admin` SET `full_name`='$full_name',`username`='$user_name' WHERE `Id`='$update_admin'";

	$result_admin=mysqli_query($con,$query);

	if ($result_admin) {
		 echo '<script>alert("Admin Updated Successfully") </script>' ;
		 echo "<script>window.open('manage_admin.php','_self')</script>";
	}else{
		echo '<script>alert("Admin Not update ") </script>' ;
		 echo "<script>window.open('manage_admin.php','_self')</script>";
	}

 }

?> 

<?php } ?>