<?php
$host = "localhost";
$user = "root";
$pass = "rakshith@2004";  // put your MySQL root password here, or leave empty if none
$dbname = "inventorydb";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
