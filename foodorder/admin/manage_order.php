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
		<h1>Manage Order</h1>

		<br>

<br><br><br>
			<table style="width: 1300px; padding: 2%">
				<tr >
					<th>S_N</th>
					<th>Food</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
					<th>Order Date</th>
					<th>Status</th>
					<th>Customer Name</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
				<?php 
					$i = 0;
					//Get the value from database order table 
					$sql = "SELECT * FROM `tbl_order`";
					//Execute the query
					$result = mysqli_query($con,$sql);
					while ($row = mysqli_fetch_array($result)) {
						
						$food = $row['food'];
						$id = $row['Id'];
						$Price = $row['price'];
						$qty = $row['qty'];
						$total = $row['total'];
						$order_date = $row['order_date'];
						$status = $row['status'];
						$customer_name = $row['customer_name'];
						$customer_contact = $row['customer_contact'];
						$customer_email = $row['customer_email'];
						$customer_address = $row['customer_address'];
						$i++;

					?>
				<tr>
					
					<td><?php echo $i ;?></td>
					<td><?php echo $food ;?></td>
					<td><?php echo $Price ;?></td>
					<td><?php echo $qty ;?></td>
					<td><?php echo $total ;?></td>
					<td><?php echo $order_date ;?></td>
					<td><?php echo $status ;?></td>
					<td><?php echo $customer_name ;?></td>
					<td><?php echo $customer_contact ;?></td>
					<td><?php echo $customer_email ;?></td>
					<td><?php echo $customer_address ;?></td>
					<td>
						
						<a href="delete_order.php?id=<?php echo $id ?>" class="btn-danger">Delete </a>
						 
					</td>
					
				</tr>
				<?php }
					?>
			</table>

		<div class="clearfix"></div>
	</div>
	</div>
	<! -- Main content Section End -->

	<?php include("include/footer.php")?>

	<?php }?>