<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('./serve.php');



if ($con) {
    if (isset($_POST['register'])) {
        // receive all input values from the register.php form
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pword = mysqli_real_escape_string($con, $_POST['pword']);
        $pword2 = mysqli_real_escape_string($con, $_POST['confirm_pword']);



        //by using array_push() corresponding errors in $errors() which is an array of errors.
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($pword)) {
            array_push($errors, "Password is required");
        }


        if ($pword != $pword2) {
            array_push($errors, "The two passwords do not match");
            }
            
        //fistly check in database that a user does not already exist with the same username and/or email.
        $get_all = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($con, $get_all);
       
        $user = mysqli_fetch_assoc($result);
 
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username is already existed");
            }

            if ($user['email'] === $email) {
                array_push($errors, "email is already existed");
            }
        }

        // Finally, register user if no error
        if (count($errors) == 0) {
            //encrypt the password before inserting in the database

            $register = "INSERT INTO `users`(`username`, `email`, `pword`)
                            VALUES('$username', '$email', '$pword')";
                         
            mysqli_query($con, $register);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('Location: ../adminProfile.php');
        }
    }
}
?>



