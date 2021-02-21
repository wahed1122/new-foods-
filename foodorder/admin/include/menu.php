

<?php 
session_start();
include('connection.php');

?>



<!DOCTYPE html>
<html>
<head>
	<title>Food Order Website Admin Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<! -- Menu Section Start -->
	<div class="menu text_center">
		<div class="b">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="manage_admin.php">Admin</a></li>
				<li><a href="manage_category.php">Category</a></li>
				<li><a href="manage_food.php">Food</a></li>
				<li><a href="manage_order.php">Order</a></li>
				<li><a href="logout.php">LogOut</a></li>
			</ul>
		</div>
	</div>
	<! -- Menu Section End -->

