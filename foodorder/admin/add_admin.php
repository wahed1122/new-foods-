<?php include("include/menu.php")?>
<div class="main_content">
		<div class="b">
		<h1>Add Admin</h1>
		<br>
<form action="" method="post"  >
	<label class="label">Full Name</label>
	<input type="text" class="control" name="full_name" placeholder="Type Full Name" required="">
	<br>
	<label class="label">User Name</label>
	<input type="text" class="control" name="user_name" placeholder="Type User name" required="">
	<br>
	<label class="label">Password</label>
	<input type="Password" class="control" name="password" placeholder="Type User Password">
	<br>
	<input type="submit" class="btn-primary primary " name="submit" value="Login" required="">
</form>
<div class="clearfix"></div>
</div>
</div>
<?php include("include/footer.php")?>

<?php 

if(isset($_POST['submit'])){
	 $full_name=$_POST['full_name'];
	 $user_name=$_POST['user_name'];
	 $password=md5($_POST['password']);

	$sql="INSERT INTO `tbl_admin`(`full_name`, `username`, `password`) VALUES ('$full_name','$user_name','$password')";
	$result=mysqli_query($con,$sql);
	if ($result) {
		 echo '<script>alert("Admin Insert Successfully") </script>' ;
		 echo "<script>window.open('manage_admin.php','_self')</script>";
	}else{
		echo '<script>alert("Admin Not Insert ") </script>' ;
		 echo "<script>window.open('add_admin.php','_self')</script>";
	}

}

?>