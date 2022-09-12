<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Reply to Feedback</h1>
        <br><br>


        <?php

        //CHeck whether id is set or not
        if (isset($_GET['id'])) {
            //GEt the Order Details
            $id = $_GET['id'];

            //Get all other details based on this id
            //SQL Query to get the order details
            $sql = "SELECT * FROM tbl_contact WHERE id=$id";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                //Detail Availble
                $row = mysqli_fetch_assoc($res);
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
            } else {
                //DEtail not Available/
                //Redirect to Manage Order
                header('location:' . SITEURL . 'admin/feedbacks.php');
            }
        } else {
            //REdirect to Manage ORder PAge
            header('location:' . SITEURL . 'admin/feedbacks.php');
        }

        ?>

        <form action="" method="POST">

            <table class="tbl-full">





                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Message</td>
                    <td style="height: 200px;">
                        <textarea name="comment" class="area" placeholder=" E.g. Enter your message here..." required></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">

                        <input type="submit" name="submit" value="Send" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>


        <?php
        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'C:/xampp/htdocs/SDProjectFinal/phpmailer/vendor/autoload.php';
        if (isset($_POST['submit'])) {
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'ahnaf.samin7@gmail.com';                     //SMTP username
                $mail->Password   = 'olzhifdykroxdnsk';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('ahnaf.samin7@gmail.com', 'AUST Canteen Authority');
                $mail->addAddress($customer_email);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reply to your valuable feedback';
                $mail->Body    = $_POST['comment'];
                $mail->AltBody = $_POST['comment'];

                $mail->send();
                $_SESSION['reply'] = "<div class='success text-center'>Reply Sent Successfully.</div>";
                header('location:' . SITEURL . 'admin/feedbacks.php');
            } catch (Exception $e) {
                echo "Reply could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>