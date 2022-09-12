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
        <div class="mt-[-30px] bg-black gap-10 justify-items-center w-[1050px] center h-[900px]">

            <form action="" method="POST" class="order mt-10  rounded-3xl p-5 pt-[40px] bg-green-600">

                <fieldset style="border: 5px" class="glass rounded-3xl bg-green-600 glass hover:bg-black ease-in duration-300">
                    <h2 class=" text-left ml-5 text-white text-3xl mb-5 mt-10">Feedback Form</h2>

                </fieldset>

                <fieldset style="border: 5px" class="mt-5">
                    <!-- <legend class="text-2xl ">Feedback Form</legend> -->
                    <div class="order-label text-white mt-5">Full Name</div>
                    <input class="input input-bordered  input-success w-full mb-1 hover:rounded-3xl ease-in duration-300" type="text" name="full-name" placeholder="E.g. Ahnaf Samin" class="input-responsive" required>

                    <div class="order-label text-white mt-2">Phone Number</div>
                    <input class="input input-bordered input-success w-full mb-1" type="tel" name="contact" maxlength="11" placeholder="E.g. 01876096649" class="input-responsive" required>

                    <div class="order-label text-white mt-2 ">AUST Edu mail</div>
                    <input class="input input-bordered input-success w-full mb-1" type="email" name="email" placeholder="E.g. 190204031@aust.edu" class="input-responsive" required>
                    <div class="order-label text-white mt-2 ">Your Message</div>
                    <textarea name="comment" class="w-full bg-black input input-bordered input-success rounded-3xl h-[210px]" placeholder=" E.g. Enter your message here..." required></textarea>
                    <input class="btn btn-active btn-success mt-5 border-none hover:bg-emerald-700 hover:text-white" type="submit" name="submit" value="Send Message" class="btn btn-secondary">
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

                $order_date = date("Y-m-d h:i:sa"); //Order DAte

                $status = $_POST['comment'];  // Ordered, On Delivery, Delivered, Cancelled

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];


                $email_regex = "/([1-2])+@([a-zA-Z])+(.edu)+/";
                if (preg_match($email_regex, $customer_email)) {
                    $sql2 = "INSERT INTO tbl_contact SET 
                            order_date = '$order_date',
                            customer_name = '$customer_name',
                            customer_contact = '$customer_contact',
                            customer_email = '$customer_email',
                            status = '$status'
                        ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if ($res2 == true) {
                        //Query Executed and Order Saved
                        $_SESSION['order'] = "<div class='success text-center'>Feedback Sent Successfully.</div>";

                        Redirect(SITEURL, true);
                        // header('location:' . SITEURL);
                    } else {
                        //Failed to Save Order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Send Feedback.</div>";
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