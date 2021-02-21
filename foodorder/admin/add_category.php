<?php include("include/menu.php")?>
<div class="main_content">
		<div class="b">
		<h1>Add Category</h1>
		<br>
<form action="" method="post"  enctype="multipart/form-data">
	<label class="label">Title</label>
	<input type="text" class="control" name="title" placeholder="Type Category Title " required="">
	<br>
	<label class="label">Select Image</label>
	<input type="file" class="control" name="image" >
	<br>
	
	<label class="label">Featured: </label>
	<input type="radio"  name="featured" value="yes"> Yes 
	<input type="radio"  name="featured" value="no"> No
	<br>
	<label class="label">Active: </label>
	<input type="radio"  name="active" value="yes"> Yes 
	<input type="radio"  name="active" value="no"> No
	<br><br>
	<input type="submit" class="btn-primary primary " name="submit" value="Add Category" >
</form>
<div class="clearfix"></div>
</div>
</div>
<?php include("include/footer.php")?>

<?php 

if(isset($_POST['submit'])){
	 $title=$_POST['title'];
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
	 //chack whether the image is selected or not set the value for image name accurdingly 
	 if (isset($_FILES['image']['name'])) {
	 	//upload the image
	 	//to uplaad image we need image name and destinetion path
	 	$image_name = $_FILES['image']['name'];
	 	$temp_admin_image = $_FILES['image']['tmp_name'];
    
    
	 	//Finaly upload the image 
	 	move_uploaded_file($temp_admin_image,"images/category/$image_name");
	 }else{
	 	//don't upload image and set the image name as blank
	 	$image_name = "";
	 }

	 //Create SQL Query tp insert into category database 

	$sql="INSERT INTO `tbl_category`( `title`,`image_name`, `featured`, `active`) VALUES ('$title','$image_name','$featured','$active')";
	//Execute the query set Database
	$result=mysqli_query($con,$sql);
	if ($result) {
		 echo '<script>alert("Category Insert Successfully") </script>' ;
		 echo "<script>window.open('manage_category.php','_self')</script>";
	}else{
		echo '<script>alert("Admin Not Insert ") </script>' ;
		 echo "<script>window.open('add_category.php','_self')</script>";
	}

}

?>