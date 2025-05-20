<?php
$host = "localhost";
$user = "root";
<<<<<<< HEAD
$pass = "newpassword";
$dbname = "inventorydb";

$conn = new mysqli($host, $user, $pass, $dbname);
=======
$pass = "rakshith@2004";  // put your MySQL root password here, or leave empty if none
$dbname = "inventorydb";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
>>>>>>> 0f2343101dd09dcf6b45d4c3a100256c24b31759
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
