<?php include("include/menu.php")?>
<?php 

   		include("connection.php");

        //chack whether the id and image_name value is set or not
		if (isset($_GET['food']) AND isset($_GET['image_name'])) {
			// get the value and delete 
			$delete_id = $_GET['food'];
			$image_name = $_GET['image_name'];
			//Remove the physical image file is available
			if ($image_name!="") {
				//image is available so image is remove 
				$path = "images/food/$image_name";
				//remove the image
				$remove = unlink($path);
				//failed to remove image then add and error massege
				if ($remove==false) {
					$_SESSION['no-food-found'] = "<div class='error'>Food not found</div>";
					echo "<script>window.open('manage_food.php','_self')</script>";;
				    die();
				}
			}
			//Delete Data from Database 
			//sql query from delete data from database 
			$sql = "DELETE FROM `tbl_foods` WHERE `Id`=$delete_id";
			$result = mysqli_query($con,$sql);
			//chack whether the data delete from database or not
			if ($result) {
				$_SESSION['delete_success'] = "<div class='success'>Food Delete Successfully </div>";
					echo "<script>window.open('manage_food.php','_self')</script>";;
			}else{
				$_SESSION['delete_success'] = "<div class='error'>Food Failed To Delete</div>";
				echo "<script>window.open('manage_food.php','_self')</script>";;
			}
			//Redirect to manage_category page 
		}else{
			//redirect to manage_category page
			echo "<script>window.open('manage_category.php','_self')</script>";
		}
		// $delete_id = $_GET['Id'];
		// echo $delete_id;
		
        
        // $delete = "DELETE FROM `tbl_admin` WHERE `Id`='$delete_id'";
        
        // $run_delete = mysqli_query($con,$delete);
        
        // if($run_delete){
            
        //     echo "<script>alert('One of your Admin has been Deleted')</script>";
            
        //     echo "<script>window.open('manage_admin.php','_self')</script>";
            
        // }
        
  

?>