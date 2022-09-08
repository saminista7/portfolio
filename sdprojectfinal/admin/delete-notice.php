$count2 = mysqli_num_rows($res2);

            //CHeck whether food available or not
            if ($count2 > 0) {

?>
else {
                //Food Not Available 
                echo "<div class='error'>Food not available.</div>";
            }