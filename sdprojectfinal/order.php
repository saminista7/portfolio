<?php include('partials-front/menu.php'); ?>
<?php
function Redirect($url, $permanent = false)
{
    echo "<script> window.location.href='$url' </script>";
}


//CHeck whether food id is set or not
if (isset($_GET['food_id'])) {
    //Get the Food id and details of the selected food
    $food_id = $_GET['food_id'];

    //Get the DEtails of the SElected Food
    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
    //Count the rows
    $count = mysqli_num_rows($res);
    //CHeck whether the data is available or not
    if ($count == 1) {
        //WE Have DAta
        //GEt the Data from Database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        //Food not Availabe
        //REdirect to Home Page
        // header('location:' . SITEURL);
        Redirect(SITEURL, true);
    }
} else {
    //Redirect to homepage
    // header('location:' . SITEURL);
    Redirect(SITEURL, true);
}
?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search-bg">
    <div class="container">


        <!-- <hr class="mb-10"> -->
        <div class="bg-black gap-10 justify-items-center w-[1000px] center h-[1000px]">
            <h2 class="text-center text-black text-2xl font-bold mb-10 mt-10">Fill this form to confirm your order</h2>
            <form action="" method="POST" class="order mt-10">

                <fieldset style="border: 5px; border-radius: 2em" class="bg-green-700 w-[500px] p-10 glass hover:bg-green-500 ease-in duration-300">
                    <!-- <legend class="text-lg text-black">Selected Food</legend> -->

                    <div class="food-menu-img">
                        <?php

                        //CHeck whether the image is available or not
                        if ($image_name == "") {
                            //Image not Availabe
                            echo "<div class='error'>Image not Available.</div>";
                        } else {
                            //Image is Available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve scale-100 hover:scale-[1.15] ease-in duration-300">
                        <?php
                        }

                        ?>

                    </div>

                    <div class="food-menu-desc">
                        <h3 class="text-2xl font-semibold text-white"><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p class="text-white text-xl font-semibold bg-emerald-900 rounded-3xl w-fit p-2"><?php echo $price; ?> tk</p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <div class="order-label mt-2">Quantity</div>
                        <input type="number" class="input success text-white" oninput="javascript: if (this.value.length > this.max.length ) this.value = this.value.slice(0,maxLength);" name="qty" class="input-responsive " max="10" maxlength="2" value="1" required>

                    </div>

                </fieldset>

                <fieldset style="border: 5px" class="mt-5">
                    <legend class="text-2xl ">Delivery Details</legend>
                    <div class="order-label mt-5">Full Name</div>
                    <input class="input input-bordered input-success w-full mb-1" type="text" name="full-name" placeholder="E.g. Ahnaf Samin" class="input-responsive" required>

                    <div class="order-label mt-2">Phone Number</div>
                    <input class="input input-bordered input-success w-full mb-1" type="tel" maxlength="11" name="contact" placeholder="E.g. 01876096649" class="input-responsive" required>

                    <div class="order-label mt-2 ">AUST Edu mail</div>
                    <input class="input input-bordered input-success w-full mb-1" type="email" name="email" placeholder="E.g. 190204031@aust.edu" class="input-responsive" required>

                    <div class="order-label mt-2 ">Location</div>
                    <div class="order-label mt-2 font-extralight ">Floor</div>
                    <!-- <textarea class="input input-bordered input-success w-full mb-1" name="address" rows="10" placeholder="7th Floor, B Block, 7B07" class="input-responsive" required></textarea> -->
                    <select class="select select-success input input-bordered input-success w-full mb-1 mt-1" id="type" name="floor" required>
                        <option disabled selected value="">Pick your Location</option>
                        <option>Ground Floor</option>
                        <option>1st Floor</option>
                        <option>2nd Floor</option>
                        <option>3rd Floor</option>
                        <option>4th Floor</option>
                        <option>5th Floor</option>
                        <option>6th Floor</option>
                        <option>7th Floor</option>
                        <option>8th Floor</option>
                        <option>9th Floor</option>
                    </select>
                    <div class="order-label mt-2 font-extralight ">Block</div>
                    <select class="select select-success input input-bordered input-success w-full mb-1" id="size" name="block" required>
                        <option disabled selected>Pick your Location</option>
                    </select>
                    <input class="btn btn-active btn-success mt-5 border-none hover:bg-emerald-700 hover:text-white mt-5" type="submit" name="submit" value="Confirm Order" class="btn btn-secondary">

                </fieldset>

                <script>
                    $(document).ready(function() {
                        $("#type").change(function() {
                            var val = $(this).val();
                            if (val == "Ground Floor") {
                                $("#size").html("<option value='A Block'>A Block</option><option value='TT Ground'>TT Ground</option><option value='RedX'>RedX</option><option value='One Bank'>One Bank</option><option value='Jury Room Front'>Jury Room Front</option> <option value='Auditorium'>Auditorium</option>");
                            } else if (val == "1st Floor") {
                                $("#size").html("<option value='Hawa Bhaban'>Hawa Bhaban</option><option value='Civil Balcony'>Civil Balcony</option><option value='A Block'>A Block</option> <option value='B Block'>B Block</option> <option value='C Block'>C Block</option>");
                            } else if (val == "2nd Floor") {
                                $("#size").html("<option value='Hawa Bhaban Architecture'>Hawa Bhaban Architecture</option><option value='A Block'>A Block</option> <option value='B Block'>B Block</option> <option value='C Block'>C Block</option>");
                            } else {
                                $("#size").html("<option value = 'A Block' > A Block </option> <option value='B Block'>B Block</option> <option value = 'C Block' > C Block </option>");
                            }
                        });
                    });
                </script>

                <!-- <script>
                    // Map your choices to your option value
                    var lookup = {
                        'Ground Floor': ['A Block', 'TT Ground 1', 'RedX', 'One Bank', 'Auditorium', 'Jury Room Front'],
                        '1st Floor': ['A Block', 'B Block', 'C Block', 'Hawa Bhaban'],
                        '2nd Floor': ['A Block', 'B Block', 'C Block'],
                        '3rd Floor': ['A Block', 'B Block', 'C Block'],
                        '4th Floor': ['A Block', 'B Block', 'C Block'],
                        '5th Floor': ['A Block', 'B Block', 'C Block'],
                        '6th Floor': ['A Block', 'B Block', 'C Block'],
                        '7th Floor': ['A Block', 'B Block', 'C Block'],
                        '8th Floor': ['A Block', 'B Block', 'C Block'],

                    };

                    // When an option is changed, search the above for matching choices
                    $('#options').on('change', function() {
                        // Set selected option as variable
                        var selectValue = $(this).val();

                        // Empty the target field
                        $('#choices').empty();

                        // For each chocie in the selected option
                        for (i = 0; i < lookup[selectValue].length; i++) {
                            // Output choice in the target field
                            $('#choices').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
                        }
                    });
                </script> -->

            </form>

            <?php
            //CHeck whether submit button is clicked or not
            if (isset($_POST['submit'])) {
                // Get all the details from the form

                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty; // total = price x qty 

                $order_date = date("Y-m-d h:i:sa"); //Order DAte

                $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['floor'] . " " . $_POST['block'];

                $email_regex = "/([1-2])+@([a-zA-Z])+(.edu)+/";
                if (preg_match($email_regex, $customer_email)) {
                    $sql2 = "INSERT INTO tbl_order SET 
                            food = '$food',
                            price = $price,
                            qty = $qty,
                            total = $total,
                            order_date = '$order_date',
                            status = '$status',
                            customer_name = '$customer_name',
                            customer_contact = '$customer_contact',
                            customer_email = '$customer_email',
                            customer_address = '$customer_address'
                        ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if ($res2 == true) {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";

                        Redirect(SITEURL, true);
                        // header('location:' . SITEURL);
                    } else {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        Redirect(SITEURL, true);
                        // header('location:' . SITEURL);
                    }
                } else {
                    echo '<script>alert("Enter your valid aust edu mail!")</script>';
                }
                //Save the Order in Databaase
                //Create SQL to save the data
            }
            ?>
        </div>
</section>
<?php include('partials-front/footer.php'); ?>