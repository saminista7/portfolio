<?php include('partials-front/menu.php'); ?>
<?php
function Redirect($url, $permanent = false)
{
    echo "<script> window.location.href='$url' </script>";
}
?>


<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search-bg">
    <div class="container">


        <!-- <hr class="mb-10"> -->
        <div class="bg-black gap-10 justify-items-center w-[1000px] center h-[1000px]">
            <h2 class="text-center text-black text-2xl font-bold mb-10 mt-10">Fill this form to send feedback</h2>
            <form action="" method="POST" class="order mt-10">

                <fieldset style="border: 5px; border-radius: 2em" class="bg-green-700 w-[500px] p-10 glass hover:bg-green-500 ease-in duration-300">
                    <h2 class="text-center text-white text-2xl font-bold mb-10 mt-10">Fill this form to send feedback</h2>

                </fieldset>

                <fieldset style="border: 5px" class="mt-5">
                    <legend class="text-2xl ">Details</legend>
                    <div class="order-label mt-5">Full Name</div>
                    <input class="input input-bordered input-success w-full mb-1" type="text" name="full-name" placeholder="E.g. Ahnaf Samin" class="input-responsive" required>

                    <div class="order-label mt-2">Phone Number</div>
                    <input class="input input-bordered input-success w-full mb-1" type="tel" name="contact" placeholder="E.g. 01876096649" class="input-responsive" required>

                    <div class="order-label mt-2 ">AUST Edu mail</div>
                    <input class="input input-bordered input-success w-full mb-1" type="email" name="email" placeholder="E.g. 190204031@aust.edu" class="input-responsive" required>
                    <div class="order-label mt-2 ">Your Message</div>
                    <textarea name="comment" class="w-full bg-black rounded h-[210px]" required>Enter text here...</textarea>
                    <input class="btn btn-active btn-primary mt-5" type="submit" name="submit" value="Send Message" class="btn btn-secondary">
                </fieldset>

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
< !--fOOD sEARCH Section Ends Here-->
    <?php include('partials-front/footer.php'); ?>