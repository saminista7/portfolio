<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search-bg food-search text-center">
    <div class="container bg-black rounded-2xl h-[72px] p-5 opacity-70">
        <?php

        //Get the Search Keyword
        // $search = $_POST['search'];
        $search = mysqli_real_escape_string($conn, $_POST['search']);

        ?>


        <h2 class="text-2xl font-bold text-white ">Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu bg-gradient-to-r from-black via-green-900 to-black">

    <div class="container grid grid-cols-1 lg:grid-cols-2 justify-items-center ">


        <?php
        //Display Foods that are Active
        $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

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

                <div style="justify-content: center; display: flex;" class="p-5 food-menu-box glass m-5 scale-100 hover:scale-110 clicked:scale-150 ease-in duration-300">
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
                        <h4 class="text-2xl font-bold text-white"><?php echo $title; ?></h4>
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