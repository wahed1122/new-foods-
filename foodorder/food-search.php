<?php 

include('include/header.php');

?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
            //Get the search Keyword
            $search = $_POST['search'];
            ?>
            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
            //SQL query to get foods Best on search keyword
            $sql = "SELECT * FROM `tbl_foods`where title like '%$search%' or description like '%$search%'";

            //Execute the query 
            $result=mysqli_query($con,$sql);
            //count rows
            $count = mysqli_num_rows($result);
            //check whether food available or not
            if ($count) {
               //food available
                while ($rows = mysqli_fetch_array($result)) {
                    $food_id = $rows['Id'];
                    $food_title = $rows['title'];
                    $description = $rows['description'];
                    $price = $rows['price'];
                    $food_image = $rows['image_name'];
                    ?>
                     <div class="food-menu-box">
                <div class="food-menu-img">

                    <?php 
                    //check whether image name is available or not
                    if ($food_image=="") {
                    echo "<div class='error'>Image is not Available </div>";
                }else{
                    //Image is available
                    ?>
                    <img src="admin/images/food/<?php echo $food_image;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>
                  <?php 
                }
                ?>
                   
                   
               

                <div class="food-menu-desc">
                    <h4><?php echo $food_title;?></h4>
                    <p class="food-price">BDT <?php echo $price;?></p>
                    <p class="food-detail">
                        <?php echo $description;?>
                    </p>
                    <br>

                    <a href="order.php?food_id=<?php echo $food_id ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                    <?php
                    
                }
            }else{
                //food not available
                echo "<div class='error'>Food not found</div>";
            }

            ?>
           


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php 

include('include/footer.php')

 ?>