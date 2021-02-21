<?php
	session_start(); 
	include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Food Ordering System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<! -- Main content Section Start -->
	<div class="login">

		<h1 class="text_center">Admin Login</h1>
		<p style="color:red; margin-top: 4px;" class="text_center">please login to Access Admin Panel</p><br>

		<!-- Login Form Start Here -->
		<form action="" method="post" class="text_center">
			<label class="label">UserName:</label>

			<input type="text" name="username" class="login_form" placeholder="Enter The UserName" required="">

			<label class="label">Password:</label>

			<input type="password" name="password" class="login_form" placeholder="Enter the Password" required=""><br>

			<input type="submit" class="login_primary" name="login" value="Login" required="">

		</form><br>
		<!-- Login Form End Here -->

			<p class="text_center">Created by <a href="https://www.facebook.com/md.abdulwahed.336/">Ab Wahed</a></p>

		<div class="clearfix"></div>
	</div>
	<! -- Main content Section End -->
</body>
</html>

<?php 

//chack whether the submit button click or not
if (isset($_POST['login'])) {
	// Process for login
	//get tha data from login from 
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	//SQL to Chack whether the user with username and password 
	$get_admin = "SELECT * FROM `tbl_admin` WHERE `username`='$username' AND `password`='$password'";
	$run_admin = mysqli_query($con,$get_admin);
        
     $count = mysqli_num_rows($run_admin);


	

	if ($count==1) {
		//user Available Login Success 
		$_SESSION['user']=$username;

		echo '<script>alert("Login Successfully") </script>' ;
		 echo "<script>window.open('index.php','_self')</script>";
		 
	}else{
		//user not Available Login Fail
	}


}

?>
	


