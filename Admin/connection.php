<?php
$servername = "localhost";
$username = "root";
$password = "";
$myDB= "register";

// Create connection
$conn = new mysqli($servername, $username, $password,$myDB);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    require_once('CreateDatabase.php');
} 
// echo "Connected successfully";
?>