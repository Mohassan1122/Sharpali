<?php

// session_start();
// $username = "";
// $email    = "";
// $errors = array();
// // connect to the database
// $con = mysqli_connect('127.0.0.1', 'root', '', 'sharpali');

$servername = "127.0.0.1"; // Use 127.0.0.1 instead of 'localhost'
$username = "root";
$password = ""; 
$dbname = "sharpali";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";