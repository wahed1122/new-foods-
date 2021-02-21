<?php 

include('include/header.php');

?>
<?php 
    //check whether food id is set or not
    if (isset($_GET['food_id'])) {
        # GET the food id and details the selected food 
        $food_id = $_GET['food_id'];
        //get the details of the selected food 
        $sql = "SELECT * FROM `tbl_foods` WHERE `Id`=$food_id";
        //Execute the query
        $result = mysqli_query($con,$sql);
        //count the rows
        $count = mysqli_num_rows($result);
        //check whether the data is available or not
        if ($count==1) {
            # We have Data
            //get the data from databalse 
            $row = mysqli_fetch_array($result);
            $Title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }else{
            //food not available
            header('location:index.php');
        }

    }else{
        //Redirect to HomePage
        header('location:index.php');
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="admin/images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $Title;?></h3>
                        <input type="hidden" name="title" value="<?php echo $Title;?>">
                        <p class="food-price">BDT <?php echo $price ;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full_name" placeholder="E.g. Md Abdul Wahed" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 01733******" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. mdwahed@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price*$qty;
                $full_name = $_POST['full_name'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $status = "Ordered"; //ordered , on delevery and cancled

                $sql2 = "INSERT INTO `tbl_order`(`food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES ('$title','$price','$qty','$total',now(),'$status','$full_name','$contact','$email','$address')";
                
                $result2 = mysqli_query($con,$sql2);
                if ($result2) {
                    echo "successfully";
                }



            }

            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

   <?php 

include('include/footer.php')

 ?>