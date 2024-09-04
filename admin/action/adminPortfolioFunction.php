<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('./serve.php');



if ($con) {
    if (isset($_POST['submit'])) {
        // receive all input values from the register.php form
        $body = mysqli_real_escape_string($con, $_POST['body']);
        $image = $_FILES['image']['name'];
        $description = mysqli_real_escape_string($con, $_POST['description']);



        // die($description .$body. ' ' .$image) ;

        //by using array_push() corresponding errors in $errors() which is an array of errors.
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
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $query = "INSERT INTO `portfolio`(`body`, `image`, `description`)
                            VALUES('$body', '$image', '$description')";

                mysqli_query($con, $query);
                $_SESSION['body'] = $body;
                echo "<script>alert('Image uploaded successfully');</script>";
                echo "<script>window.location.href=' ../adminPortfolio.php';</script>";
            } else {
                echo "<script>alert('Failed to upload image');</script>";
                echo "<script>window.location.href=' ../adminPortfolio.php';</script>";
            }
           
        }
    }
}
