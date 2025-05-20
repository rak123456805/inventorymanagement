<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $quantity = (int) $_POST['quantity'];
    $price = (float) $_POST['price'];

    $sql = "INSERT INTO items (name, quantity, price) VALUES ('$name', $quantity, $price)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect back to index.php after insert
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: index.php"); // Redirect if accessed directly
    exit();
}
?>
