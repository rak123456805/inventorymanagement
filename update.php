<?php
include 'db.php';
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $qty = $_POST['quantity'];
    $price = $_POST['price'];
    $conn->query("UPDATE products SET name='$name', quantity=$qty, price=$price WHERE id=$id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
    <h2>Edit Product</h2>
    <form method="post">
        Name: <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
        Quantity: <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required><br>
        Price: <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
