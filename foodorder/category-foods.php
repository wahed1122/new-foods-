<?php 

include('include/header.php');

?>
<?php
    //check whether id is passed or not
if (isset($_GET['category_id'])) {
    # category id is set and get the id
    $category_id = $_GET['category_id'];
    //get the category title based on category id
    $sql = "SELECT `title` FROM `tbl_category` WHERE `Id`='$category_id'";
    #execute the query
    $result = mysqli_query($con,$sql);
   
    //get the value from  database 

    $row = mysqli_fetch_array($result);
    //GET the title 
    $category_title = $row['title'];

}else{
    //category not passed 
    //redirect to Home page 
    header('location:index.php');
}
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $category_title ;?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            //creata sql query and display all food menu in database 
            $sql2="SELECT * FROM `tbl_foods` WHERE `category_id`='$category_id' ";
            //execute the sql query 
            $reuslt2 = mysqli_query($con,$sql2);
            //count rows to chack whether food is available or not
            $count2 = mysqli_num_rows($reuslt2);
            if ($count2>0) {
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
                }}else{
                     echo "<div style='color:red;text-align:center'>Food not Available </div>";
                }

            ?>

            


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php 

include('include/footer.php')

 ?>