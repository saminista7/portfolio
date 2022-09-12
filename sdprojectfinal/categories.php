<?php include('partials-front/menu.php'); ?>



<!-- CAtegories Section Starts Here -->
<div class="bg-gradient-to-r from-black via-green-900 to-black">
    <section class="categories ml-10 mr-10 mb-5">
        <h1 class="ml11 text-center mb-5 text-[4em] font-bold">
            <span class="text-wrapper">
                <span class="line line1">__</span>
                <span class="letters text-center text-green-500 text-3xl">

                    <p class=" text-white text-3xl"> Explore</p>
                </span>
                <span class="line line1">__</span>
                <span class="letters text-center text-white text-3xl">

                    <p class=" text-white text-3xl">Foods</p>


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
        <div class="grid grid-cols-1 lg:grid-cols-4 place-content-center mt-10 " style="grid-row-gap: 50px;">

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
                        <div style="display: flex; justify-content: center" class="justify-content h-[400px]] w-[300px] float-container rounded-xl overflow-hidden drop-shadow-md hover:drop-shadow-2xl ease-in duration-300">
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


                            <h3 class="float-text text-white text-2xl font-semibold text-center"><?php echo $title; ?></h3>
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


    <?php include('partials-front/footer.php'); ?>