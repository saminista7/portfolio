<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Notice</h1>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Notice </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Notice">
                    </td>
                </tr>

                <tr>
                    <td>Active Status</td>
                    <td>
                        <select type="text" name="username" placeholder="Yes/ No">
                            <option>Yes</option>
                            <option>No</option>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add notice" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
//Process the Value from Form and Save it in Database

//Check whether the submit button is clicked or not

if (isset($_POST['submit'])) {
    // Button Clicked
    //echo "Button Clicked";

    //1. Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO notice SET 
            notice='$full_name',
            active='$username'
        ";

    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted
        //echo "Data Inserted";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='success'>Notice Added Successfully.</div>";
        //Redirect Page to Manage notice
        header("location:" . SITEURL . 'admin/index.php');
    } else {
        //FAiled to Insert DAta
        //echo "Faile to Insert Data";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='error'>Failed to Add notice.</div>";
        //Redirect Page to Add Admin
        header("location:" . SITEURL . 'admin/add-notice.php');
    }
}

?>