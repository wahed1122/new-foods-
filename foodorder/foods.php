<?php 

include('include/header.php');

?>

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



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            //creata sql query and display all food menu in database 
            $sql2="SELECT * FROM `tbl_foods` where active='yes' ";
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

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php 

include('include/footer.php')

 ?>