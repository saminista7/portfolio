<?php include('partials/menu.php'); ?>
<?php
if (isset($_SESSION['reply'])) {
    echo $_SESSION['reply'];
    unset($_SESSION['reply']);
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Feedbacks</h1>

        <br /><br /><br />

        <?php
        if (isset($_SESSION['contact'])) {
            echo $_SESSION['contact'];
            unset($_SESSION['contact']);
        }
        ?>
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>SL</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>

            <?php
            //Get all the orders from database
            $sql = "SELECT * FROM tbl_contact ORDER BY id DESC"; // DIsplay the Latest Order at First
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count the Rows
            $count = mysqli_num_rows($res);

            $sn = 1; //Create a Serial Number and set its initail value as 1

            if ($count > 0) {
                //Order Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get all the order details
                    $id = $row['id'];
                    $order_date = $row['order_date'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $status = $row['status'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $order_date; ?></td>

                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_contact; ?></td>
                        <td><?php echo $customer_email; ?></td>
                        <td>
                            <?php echo $status; ?>
                            <?php
                            // Ordered, On Delivery, Delivered, Cancelled

                            if ($status == "Unread") {
                                echo "<label>$status</label>";
                            } elseif ($status == "Read") {
                                echo "<label style='color: orange;'>$status</label>";
                            } elseif ($status == "Replied") {
                                echo "<label style='color: green;'>$status</label>";
                            } elseif ($status == "Cancelled") {
                                echo "<label style='color: red;'>$status</label>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/reply-feedback.php?id=<?php echo $id; ?>" class="btn-secondary">Reply</a>
                        </td>
                    </tr>

            <?php

                }
            } else {
                //Order not Available
                echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
            }
            ?>


        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>