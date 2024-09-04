<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('./serve.php');



if ($con) {
    if (isset($_POST['team'])) {
        // receive all input values from the register.php form
         $image = $_FILES['image']['name'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
       
        $description = mysqli_real_escape_string($con, $_POST['description']);



        // die($description .$name. ' ' .$image) ;

        //by using array_push() corresponding errors in $errors() which is an array of errors.
        if (empty($name)) {
            array_push($errors, "name is required");
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
                $query = "INSERT INTO `team`( `image`, `name`, `description`)
                            VALUES( '$image', '$name', '$description')";

                mysqli_query($con, $query);
                echo "<script>alert('Team uploaded successfully');</script>";
                echo "<script>window.location.href=' ../adminTeam.php';</script>";
            } else {
                echo "<script>alert('Failed to upload Team');</script>";
                echo "<script>window.location.href=' ../adminTeam.php';</script>";
            }
           
        }
    }
}
