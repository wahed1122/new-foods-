<?php include("include/menu.php")?>
<?php 

   
        
		$delete_id = $_GET['id'];
		
        
        $delete = "DELETE FROM `tbl_order` WHERE `Id`='$delete_id'";

        echo $delete;
        
        $run_delete = mysqli_query($con,$delete);
        
        if($run_delete){
            
            echo "<script>alert(' Order has been Deleted')</script>";
            
            echo "<script>window.open('manage_order.php','_self')</script>";
            
        }
        
  

?>