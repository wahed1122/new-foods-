
<?php 
	//Authoriztion Access Control
	//chack whether the user logged in or not
	if (!isset($_SESSION['user']))// if user it not login rediract to login page  
	{
		
		 echo "<script>window.open('login.php','_self')</script>";
	}

 ?>