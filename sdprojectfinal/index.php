<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->

<section class="food-search text-center swiper">
    <div class="home-slider owl-carousel js-fullheight">
        <div class="slider-item js-fullheight" style="background-image:url(images/slider-1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h2>Best Time to Get Some</h2>
                            <h1 class="mb-3">Daal Puri</h1>
                            <br>
                            <br>

                        </div>
                        <div class="container">

                            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                                <input class="text-white focus:border-green-500 scale-100 hover:scale-[1.02] ease-in duration-300" type="search" name="search" placeholder="Search for Food.." required>
                                <input type="submit" name="submit" value="Search" class="btn btn-primary bg-primary ml-5">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight" style="background-image:url(images/slider-2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center flex justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h2>Best Place to Order</h2>
                            <h1 class="mb-3">Hot Shingara</h1>
                            <br>
                            <br>

                        </div>
                        <div class="container">

                            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                                <input class="text-black focus:border-green-500 scale-100 hover:scale-[1.02] ease-in duration-300" type="search" name="search" placeholder="Search for Food.." required>
                                <input type="submit" name="submit" value="Search" class="btn btn-primary bg-primary ml-5">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item js-fullheight" style="background-image:url(images/slider-3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                    <div class="col-md-12 ftco-animate">
                        <div class="text w-100 text-center">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h2>What About Some</h2>
                            <h1 class="mb-3">ICY Cold Coffee</h1>
                            <br>
                            <br>

                        </div>
                        <div class="container">

                            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                                <input class="text-black focus:border-green-500 scale-100 hover:scale-[1.02] ease-in duration-300" type="search" name="search" placeholder="Search for Food.." required>
                                <input type="submit" name="submit" value="Search" class="btn btn-primary bg-primary ml-5">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<!-- CAtegories Section Starts Here -->
<div class="bg-gradient-to-r from-black via-green-900 to-black">
    <section class="categories ml-10 mr-10">
        <div class="grid grid-cols-1 lg:grid-cols-4 place-content-center">

            <?php

            //Display all the cateories that are active
            //Sql Query
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' and featured='Yes'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether categories available or not
            if ($count > 0) {
                //CAtegories Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
            ?>

                    <a class="flex justify-center" href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class=" h-[400px]] w-[300px] float-container rounded-xl overflow-hidden drop-shadow-md hover:drop-shadow-2xl ease-in duration-300">
                            <?php
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not found.</div>";
                            } else {
                                //Image Available
                            ?>
                                <img class="h-[400px] w-auto  max-w-none scale-100 hover:scale-[1.05] ease-in duration-300" src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                            <?php
                            }
                            ?>


                            <h3 class="float-text text-white text-2xl font-semibold"><?php echo $title; ?></h3>
                        </div>
                    </a>

            <?php
                }
            } else {
                //CAtegories Not Available
                echo "<div class='error'>Category not found.</div>";
            }

            ?>
        </div>


        <div class="clearfix"></div>

    </section>
    <!-- Categories Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->

    <section class="food-menu ">
        <h2 class="text-center text-[3em] font-semibold 
            bg-gradient-to-r bg-clip-text  text-transparent 
            from-amber-500 via-green-500 to-amber-500
            animate-text mb-10">Food Menu</h2>
        <div class="container grid grid-cols-1 lg:grid-cols-4 justify-items-center gap-0 cursor-pointer bg-gradient-to-r from-black via-green-900 to-black">


            <?php

            //Getting Foods from Database that are active and featured
            //SQL Query
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 4";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //CHeck whether food available or not
            if ($count2 > 0) {
                //Food Available
                while ($row = mysqli_fetch_assoc($res2)) {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    $risky = $row['health']
            ?>

                    <div class="card w-96 glass scale-75 hover:scale-90 ease-in duration-300">
                        <figure class="overflow-hidden">
                            <?php
                            //Check whether image available or not
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
                            } else {
                                //Image Available
                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="rotate-0 scale-[1] hover:rotate-6 hover:scale-[1.1] ease-in duration-300 img-responsive img-curve">
                            <?php
                            }
                            ?>
                        </figure>
                        <div class="card-body">
                            <h4 class="text-3xl font-bold"><?php echo $title; ?></h4>
                            <p class="food-price font-bold text-[1.7em] mb-5"><?php echo $price; ?> Tk</p>
                            <p class="food-detail text-amber-100 text-[1.3em]">
                                <?php echo $description; ?>
                            </p>
                            <p class="food-detail text-red-400 text-[1.3em]">
                                <?php echo 'Probable health Risk: ' . $risky; ?>
                            </p>
                            <br>
                            <div class="card-actions justify-end">
                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                <!-- <button class="btn btn-primary">Learn now!</button> -->
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }

            ?>





            <div class="clearfix"></div>



        </div>

        <p class="text-center mt-10 hover:scale-110 active:scale-100 ease-in duration-300">
            <a href="foods.php">See All Foods</a>
        </p>
</div>
</section>
<!-- fOOD Menu Section Ends Here -->


<?php include('partials-front/footer.php'); ?>