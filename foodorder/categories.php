<?php 

include('include/header.php');


?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            //creata sql query to display categories from database  
            $sql = "SELECT * FROM `tbl_category` where active='yes'";
            $result = mysqli_query($con,$sql);
             //count rows to chack whether categories is available or not
            $count = mysqli_num_rows($result);
            if ($count) {
                //categories is available
                while ($rows=mysqli_fetch_array($result)) {
                    //get the value like id , title and image
                    $id = $rows['Id'];
                    $title = $rows['title'];
                    $image_name = $rows['image_name'];

                    ?>
            <a href="category-foods.php?category_id=<?php echo $id;?>">
            <div class="box-3 float-container">
                <?php 
                //check whether image is available or not 
                if ($image_name=="") {
                    //display message
                    echo "<div class='error'>Image is not Available </div>";
                }else{
                    //Image is available
                    ?>

                    <img style="height: 350px;width: 300px" src="admin/images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve" >
                    <?php 
                }
                ?>
                
            
                <h3 class="float-text text-white" ><?php echo $title ;?></h3>
            </div>
            </a>

                    <?php 
                }
            }else{
                //category is not available
                echo "<div class='error'>Category not Found</div>";
            }

            ?>



            

            

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


   <?php 

include('include/footer.php')

 ?>