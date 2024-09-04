<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('./serve.php');



if ($con) {
    if (isset($_POST['service'])) {
        // receive all input values from the register.php form

         $image = $_FILES['img']['name'];
        $header = mysqli_real_escape_string($con, $_POST['header']);
        $body = mysqli_real_escape_string($con, $_POST['body']);
        $description = mysqli_real_escape_string($con, $_POST['description']);



        // die($description .$body. ' ' .$image) ;

        //by using array_push() corresponding errors in $errors() which is an array of errors.
        if (empty($header)) {
            array_push($errors, "header is required");
        }
        if (empty($body)) {
            array_push($errors, "body is required");
        }

        if (empty($description)) {
            array_push($errors, "Password is required");
        }
        // image file directory
        $target = "../../agency/images/" . basename($image);

        // Finally, register user if no error
        if (count($errors) == 0) {
            //encrypt the password before inserting in the database
            if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
                $query = "INSERT INTO `services`(`img`, `header`, `body`, `description`)
                            VALUES('$image','$header', '$body', '$description')";

                mysqli_query($con, $query);

                echo "<script>alert('Service Created successfully');</script>";
                echo "<script>window.location.href=' ../adminServices.php';</script>";
            } else {
                echo "<script>alert('Failed to Create Service');</script>";
                echo "<script>window.location.href=' ../adminServices.php';</script>";
            }
           
        }
    }
}
