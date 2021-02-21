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
	$change_password=$_GET['Id'];
	//select get admin information
	$get_password="SELECT * FROM `tbl_admin` WHERE `Id`='$change_password'";
	//query connection 
	$run_password = mysqli_query($con,$get_password);
	//fatch admin information 
	

?>


<div class="main_content">
		<div class="b">
		<h1>Change Password</h1>
		<br>

		<form action="" method="post">
			<label class="label">Current Password</label>
			<input type="Password" class="control" name="old_password" placeholder="Enter Current Password">

			<label class="label">New Password</label>
			<input type="Password" class="control" name="new_password" placeholder="Enter New Password">

			<label class="label">Confirm Password</label>
			<input type="Password" class="control" name="confirm_password" placeholder="Enter Confirm Password">

			<input type="hidden" name="id" value="<?php echo $change_password; ?>">
			<input type="submit" class="btn-primary primary " name="change_password" value="Change Password" required="">
		</form>

<div class="clearfix"></div>
</div>
</div>


<?php 
	if (isset($_POST['change_password'])) {

		//get the DATA form
		$id = $_POST['id'];
		$old_password=md5($_POST['old_password']);
		$new_password=md5($_POST['new_password']);
		$confirm_password = md5($_POST['confirm_password']);

		//chack  whether the user current id and password Exit or not
		$sql = "SELECT * FROM `tbl_admin` WHERE `Id`='$id' AND `password`='$old_password'";
		//execute the query 
		$result = mysqli_query($con,$sql);
		if ($result==true) {
			//chack whether data available or not
			$count = mysqli_num_rows($result);
			if ($count==1) {
				//user Exists and password can be changed

				if ($new_password==$confirm_password) {
					$sql2="UPDATE `tbl_admin` SET `Id`='$id',`password`='$new_password' WHERE `Id`=$change_password";
					$result2 = mysqli_query($con,$sql2);
					if ($result2) {
						echo '<script>alert("Password Updated  Successfully") </script>' ;
		 		 		echo "<script>window.open('manage_admin.php','_self')</script>";
					}else{
						echo '<script>alert("Failed to Change Password") </script>' ;
		 		 		echo "<script>window.open('manage_admin.php','_self')</script>";
					}
				}else{
					echo '<script>alert("not match password  ") </script>' ;
		 		 echo "<script>window.open('manage_admin.php','_self')</script>";
				}
			}else{
				//user does not exist set massage or redirect
				 echo '<script>alert("User not found  ") </script>' ;
		 		 echo "<script>window.open('manage_admin.php','_self')</script>";
			}
		}
		//chack whether the password and confirm password match or not 

		//cnange password if all above is true 



	}

?>




<?php include("include/footer.php")?>

<?php } ?>