    <?php include('partials-front/menu.php'); ?>

    <?php
    //CHeck whether id is passed or not
    if (isset($_GET['category_id'])) {
        //Category id is set and get the id
        $category_id = $_GET['category_id'];
        // Get the CAtegory Title Based on Category ID
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Get the value from Database
        $row = mysqli_fetch_assoc($res);
        //Get the TItle
        $category_title = $row['title'];
    } else {
        //CAtegory not passed
        //Redirect to Home page
        header('location:' . SITEURL);
    }
    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search-bg text-center">
        <div class="container bg-black rounded-2xl h-[72px] p-5 opacity-70">
            <h2 class="text-2xl font-bold text-white ">Foods on Category <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu bg-gradient-to-r from-black via-green-900 to-black">

        <div class="container grid grid-cols-1 lg:grid-cols-2 justify-items-center ">


            <?php
            //Display Foods that are Active
            $sql = "SELECT * FROM tbl_food WHERE category_id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether the foods are availalable or not
            if ($count > 0) {
                //Foods Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $risky = $row['health'];
            ?>

                    <div style="justify-content: center; display: flex;" class="food-menu-box glass m-5 scale-100 hover:scale-110 clicked:scale-150 ease-in duration-300">
                        <div class="food-menu-img">
                            <?php
                            //CHeck whether image available or not
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not Available.</div>";
                            } else {
                                //Image Available
                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                            }
                            ?>

                        </div>

                        <div class="food-menu-desc">
                            <h4 class="text-2xl text-white font-bold"><?php echo $title; ?></h4>
                            <p class="food-price font-bold"><?php echo $price; ?> Tk</p>
                            <p class="food-detail text-white">
                                <?php echo $description; ?>
                            </p>
                            <p class="food-detail text-red-500 font-semibold">
                                <?php echo 'Probable health Risk: ' . $risky; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>

                        </div>
                    </div>

            <?php
                }
            } else {
                //Food not Available
                echo "<div class='error'>Food not found.</div>";
            }
            ?>





            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>