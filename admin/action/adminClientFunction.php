<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('./serve.php');



if ($con) {
    if (isset($_POST['client'])) {
        // receive all input values from the register.php form

         $image = $_FILES['image']['name'];
        $name = mysqli_real_escape_string($con, $_POST['name']);



        // die($description .$body. ' ' .$image) ;

        //by using array_push() corresponding errors in $errors() which is an array of errors.
        if (empty($name)) {
            array_push($errors, "name is required");
        }
        // image file directory
        $target = "../../agency/images/" . basename($image);

        // Finally, register user if no error
        if (count($errors) == 0) {
            //encrypt the password before inserting in the database
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $query = "INSERT INTO `client`(`image`, `name`)
                            VALUES('$image','$name')";

                mysqli_query($con, $query);

                echo "<script>alert('Client Created successfully');</script>";
                echo "<script>window.location.href=' ../adminClient.php';</script>";
            } else {
                echo "<script>alert('Failed to Create Clent');</script>";
                echo "<script>window.location.href=' ../adminClient.php';</script>";
            }
           
        }
    }
}
