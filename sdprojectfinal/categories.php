<?php include('partials-front/menu.php'); ?>



<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container flex flex-col justify-center">
        <h2 class="text-center text-green-500 text-[2em] mb-5 font-bold">Explore Foods</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 place-content-center">

            <?php

            //Display all the cateories that are active
            //Sql Query
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

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
                        <div class=" h-full w-[400px] float-container rounded-xl overflow-hidden">
                            <?php
                            if ($image_name == "") {
                                //Image not Available
                                echo "<div class='error'>Image not found.</div>";
                            } else {
                                //Image Available
                            ?>
                                <img class="h-[500px] w-auto  max-w-none " src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
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
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include('partials-front/footer.php'); ?>