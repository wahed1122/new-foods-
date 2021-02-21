<?php include("include/menu.php")?>
<?php 

   
        
		$delete_id = $_GET['Id'];
		
        
        $delete = "DELETE FROM `tbl_admin` WHERE `Id`='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete);
        
        if($run_delete){
            
            echo "<script>alert('One of your Admin has been Deleted')</script>";
            
            echo "<script>window.open('manage_admin.php','_self')</script>";
            
        }
        
  

?>