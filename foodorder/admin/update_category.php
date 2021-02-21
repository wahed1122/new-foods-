<?php include("include/menu.php")?>
<?php
if (!isset($_SESSION['user']))// if user it not login rediract to login page  
	{
		
		 echo "<script>window.open('login.php','_self')</script>";
	}else{



 ?>

<!-- <?php 

	//get category id
	if (isset($_GET['Id'])) {
		echo "Getting The Data";
	}else{
		echo "<script>window.open('manage_category.php','_self')</script>";
	}

	
	//select get admin information
	$get_category="SELECT * FROM `tbl_admin` WHERE `Id`='$update_category'";
	//query connection 
	$run_category = mysqli_query($con,$get_category);
	//fatch admin information 
	$row_category_update=mysqli_fetch_array($run_category);
	$full_name = $row_admin_update['full_name'];
	$username = $row_admin_update['username'];

?> -->

<div class="main_content">
		<div class="b">
		<h1>Update Category</h1>
		<br>

		<?php 

	
	if (isset($_GET['Id'])) {
		//echo "Getting The Data";
		//get category id
		$update_category=$_GET['Id'];
		//create SQL Query to get all other information
		$get_category="SELECT * FROM `tbl_category` WHERE `Id`='$update_category'";
		//query connection 
		$run_category = mysqli_query($con,$get_category);
		//count the rows to chack whether to id is valid or not
		$count = mysqli_num_rows($run_category);
		if ($count==1) {
			//get all the data
			//fatch admin information 
			$row_category=mysqli_fetch_array($run_category);
			$title = $row_category['title'];
			$current_image = $row_category['image_name'];
			$featured = $row_category['featured'];
			$Active = $row_category['active'];
		}else{
			//redirect to manage Catagory 
			$_SESSION['no-catetory-found'] = "<div class='error'>Category not found</div>";
			echo "<script>window.open('manage_category.php','_self')</script>";
		}
	}else{
		echo "<script>window.open('manage_category.php','_self')</script>";
	}

	?>
<form action="" method="post" enctype="multipart/form-data" >
	<label class="label">Title</label>
	<input type="text" class="control" name="title" value="<?php echo $title?>" required="">
	<br>
	<label class="label">Current Image</label>
	<br>
	<?php 
	if ($current_image!="") {
		//display the image
		?>
		<img src="images/category/<?php echo $current_image;?>" width="90" height="80"style="margin-left: 20px;">
		<?php
	}else{
		//desplay the message
		echo "<div class='error' style='margin-left: 10px;'>image not added</div>";
	}
	?>
	<br>
	<label class="label">New Image</label>
	<input type="file" class="control" name="image" >
	<br>
	
	<label class="label">Featured: </label>
	<input <?php if ($featured=="yes") {echo "checked";} ?> type="radio"  name="featured" value="yes"> Yes

	<input <?php if ($featured=="no") {echo "checked";} ?> type="radio"  name="featured" value="no"> No
	<br>

	<label class="label">Active: </label>
	<input <?php if ($Active=="yes") {echo "checked";} ?> type="radio"  name="active" value="yes"> Yes 

	<input <?php if ($Active=="no") {echo "checked";} ?> type="radio"  name="active" value="no"> No
	<br><br>
	<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
	<input type="submit" class="btn-primary primary " name="submit" value="Update Category" >
</form>

<?php 
	if (isset($_POST['submit'])) {
		//Get all the values from our form
		$title=$_POST['title'];
		$current_image = $_POST['current_image'];
		$featured = $_POST['featured'];
		$active = $_POST['active'];
		
		$image_name = $_FILES['image']['name'];
		//chack whether the image is available or not
		$temp_category_image = $_FILES['image']['tmp_name'];
		//Updating new image selected
		//Chacked whether the image selected or not
		if (isset($_FILES['image']['name'])) {
			//Get the image details
			if ($image_name!=="") {
				// Image Available
					//upload the new image
				
					//Finaly upload the image
				move_uploaded_file($temp_category_image,"images/category/$image_name");
				$remove_path = "images/category/$current_image";
				$remove = unlink($remove_path);

				//Remove the current image is available
				if ($current_image!="") {
					
					//Check whether the image removed or not
					//if failed to remove then display message and stop the process 
					if ($remove==false) {
						//failed to remove image
						$_SESSION['failed-removed']="<div class='error'>Failed to Removed Current Image</div>";
						echo "<script>window.open('manage_category.php','_self')</script>";
						die();//stop the process

					}
				}
				

			}else{
				$image_name = $current_image;
			}
	 		
		}else{
			$image_name = $current_image;
		}

		//Finaly Update the database 
		$sql = "UPDATE `tbl_category` SET `title`='$title' ,`image_name`='$image_name' , `featured`='$featured' ,`active`='$active' WHERE `Id`='$update_category'";
		// Execute the query 
		$result = mysqli_query($con,$sql);
		//chack whether excute or not
		if ($result) {
			//category update 
			$_SESSION['update'] = "<div class ='success'>Category Updated Successfully</div>";
			echo "<script>window.open('manage_category.php','_self')</script>";
		}else{
			//failed to category updated
			$_SESSION['update'] = "<div class='error'>Failed to Update Category</div>";
			echo "<script>window.open('manage_category.php','_self')</script>";
		}
		//Redirect to Mangae category

	}
?>

<div class="clearfix"></div>
</div>
</div>

<?php include("include/footer.php")?>




<?php } ?>