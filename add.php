<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $qty = $_POST['quantity'];
    $price = $_POST['price'];
    $conn->query("INSERT INTO products (name, quantity, price) VALUES ('$name', $qty, $price)");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>
    <h2>Add Product</h2>
    <form method="post">
        Name: <input type="text" name="name" required><br>
        Quantity: <input type="number" name="quantity" required><br>
        Price: <input type="number" step="0.01" name="price" required><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>
