<?php include("include/menu.php")?>
<div class="main_content">
		<div class="b">
		<h1>Add Food</h1>
		<br>
<form action="" method="post"  enctype="multipart/form-data">
	<label class="label">Title:</label>
	<input type="text" class="control" name="title" placeholder="Type Food Title " required="">
	<br>
	<label class="label">Description:</label>
	<textarea class="control" name="description" cols="30" rows="10" placeholder="Description Of the Foods"></textarea>
	<br>
	<label class="label">Price:</label>
	<input type="number" class="control" name="price" placeholder=" Food price " required="">
	<br>

	<label class="label">Select Image:</label>
	<input type="file" class="control" name="image" >
	<br>

	<label class="label">Category:</label>
	<select class="control" name="category" >
		<?php 
			//Create PHP Code Category to Desplay from Database
			//Create all active categories from Database
			$sql = "SELECT * FROM `tbl_category` WHERE `active`='yes'";
			// Execute the query
			$result = mysqli_query($con,$sql);
			//count to check whether we have categories or not
			$count = mysqli_num_rows($result);
			//if count gatherthen Zero , we heave categories else we donot have categories
			if ($count>0) {
				//we have categories?>
				<option >Select Category</option>
				<?php
				while ($row_category = mysqli_fetch_array($result)) {
					//get the details all category
					$id = $row_category['Id'];
					$title = $row_category['title'];

					?>

					<option value="<?php echo $id ?>"><?php echo $title ?></option>
					<?php
				}
			}else{
				//we donot have categories
				?>
				<option value="0">No Category Found</option>
				<?php 
			}
			//desplay on DropDown 
		?>
		
	</select>
	<br>
	
	<label class="label">Featured: </label>
	<input type="radio"  name="featured" value="yes"> Yes 
	<input type="radio"  name="featured" value="no"> No
	<br>
	<label class="label">Active: </label>
	<input type="radio"  name="active" value="yes"> Yes 
	<input type="radio"  name="active" value="no"> No
	<br><br>
	<input type="submit" class="btn-primary primary " name="submit" value="Add Food" >
</form>
<?php 

	//check whether the button is clicked or not
	if (isset($_POST['submit'])) {
		//add the food in database 
		//get the data from form

		$title=$_POST['title'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$category = $_POST['category'];
		//chack whether the image is selected or not set the value for image name accurdingly 
		if (isset($_POST['featured'])) {
		 	//get the value from form 
		 	$featured = $_POST['featured'];
		}else{
		 	//set the default value
		 	$featured = "no";
		}
		if (isset($_POST['active'])) {
		 	//get the value from form 
		 	$active = $_POST['active'];
		}else{
		 	$active = "no";
		}
		//Check whether image is clicked or not and upload the image only it the image is selected   
		if (isset($_FILES['image']['name'])) {
	 	//upload the image
	 	//to uplaad image we need image name and destinetion path
	 	$image_name = $_FILES['image']['name'];
	 	$temp_admin_image = $_FILES['image']['tmp_name'];
    
    
	 	//Finaly upload the image 
	 	move_uploaded_file($temp_admin_image,"images/food/$image_name");
	 	}else{
	 	//don't upload image and set the image name as blank
	 	$image_name = "";
	 	}
		
		//insert into Database
		//Create a SQL Query 
		$sql2 = "INSERT INTO `tbl_foods`(`title`, `description`, `price`, `image_name`, `category_id`, `feature`, `active`) VALUES ('$title','$description','$price','$image_name','$category','$featured','$active')";
		//Execute the query set Database
		$result2=mysqli_query($con,$sql2);
		if ($result2) {
		  	$_SESSION['inserted'] = "<div class='success'>foods successfully inserted</div>";
			echo "<script>window.open('manage_food.php','_self')</script>";
		}else{
			$_SESSION['inserted'] = "<div class='error'>Failed to Add foods  </div>";
			echo "<script>window.open('manage_food.php','_self')</script>";
		}
		//Redirect into message to Manage food page
	}

?>
<div class="clearfix"></div>
</div>
</div>
<?php include("include/footer.php")?>