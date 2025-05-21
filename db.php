<?php
// Database connection info
$host = 'localhost';
$user = 'root';
$pass = 'newpassword';  // Change this to your MySQL password or leave '' if none
$dbname = 'inventorydb';

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Add Item
if (isset($_POST['add'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $quantity = intval($_POST['quantity']);
    $price = floatval($_POST['price']);

    $sql = "INSERT INTO items (name, description, quantity, price) VALUES ('$name', '$description', $quantity, $price)";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

// Handle Update Item
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $quantity = intval($_POST['quantity']);
    $price = floatval($_POST['price']);

    $sql = "UPDATE items SET name='$name', description='$description', quantity=$quantity, price=$price WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

// Handle Delete Item
if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM items WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

// Handle Clear All Items
if (isset($_POST['clear'])) {
    $sql = "TRUNCATE TABLE items";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}
?>
