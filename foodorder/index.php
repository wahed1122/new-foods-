<?php 

include('include/header.php');

?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php 
            //creata sql query to display categories from database 
            $sql = "SELECT * FROM `tbl_category` where featured='yes' and active='yes' limit 3";
            //Execute The Query 
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



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            //creata sql query and display all food menu in database 
            $sql2="SELECT * FROM `tbl_foods` where active='yes' and feature = 'yes' limit 6";
            //execute the sql query 
            $reuslt2 = mysqli_query($con,$sql2);
            //count rows to chack whether food is available or not
            $count2 = mysqli_num_rows($reuslt2);
            if ($count2) {
                //categories is available
                while ($rows2=mysqli_fetch_array($reuslt2)) {
                    $food_id = $rows2['Id'];
                    $food_title = $rows2['title'];
                    $description = $rows2['description'];
                    $price = $rows2['price'];
                    $food_image = $rows2['image_name'];
                    ?>
                 <div class="food-menu-box">
                    <div class="food-menu-img">
                    <?php 
                //check whether image is available or not 
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
                    <p class="food-price">BDT <?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description;?>
                    </p>
                    <br>

                    <a href="order.php?food_id=<?php echo $food_id ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                    <?php 
                }}

            ?>
           


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

 <?php 

include('include/footer.php')

 ?>