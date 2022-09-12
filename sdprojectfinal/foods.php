<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search-bg text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input class="text-black focus:border-green-500 scale-100 hover:scale-[1.02] ease-in duration-300" type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary ml-2">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu bg-gradient-to-r from-black via-green-900 to-black">
    <h1 class="ml11 text-center text-[4em] font-bold">
        <span class="text-wrapper">
            <span class="line line1">__</span>
            <span class="letters text-center text-green-500 text-3xl">

                <p class=" text-white text-3xl"> AUST</p>
            </span>
            <span class="line line1">__</span>
            <span class="letters text-center text-white text-3xl">

                <p class=" text-white text-3xl">Food Menu</p>


            </span>

        </span>

    </h1>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>


    <script>
        // Wrap every letter in a span
        var textWrapper = document.querySelector('.ml11 .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

        anime.timeline({
                loop: true
            })
            .add({
                targets: '.ml11 .line',
                scaleY: [0, 1],
                opacity: [0.5, 1],
                easing: "easeOutExpo",
                duration: 700
            })
            .add({
                targets: '.ml11 .line',
                translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
                easing: "easeOutExpo",
                duration: 700,
                delay: 100
            }).add({
                targets: '.ml11 .letter',
                opacity: [0, 1],
                easing: "easeOutExpo",
                duration: 600,
                offset: '-=775',
                delay: (el, i) => 34 * (i + 1)
            }).add({
                targets: '.ml11',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
    </script>

    <div class="container grid grid-cols-1 lg:grid-cols-2 justify-items-center mt-5">


        <?php
        //Display Foods that are Active
        $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

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

                <div class="food-menu-box glass m-5 scale-100 hover:scale-110 clicked:scale-150 ease-in duration-300">
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