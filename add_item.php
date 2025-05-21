<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $stmt = $conn->prepare("INSERT INTO items (category, name, description, quantity, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $category, $name, $description, $quantity, $price);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
        }

        .form-container {
            width: 400px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            width: 100%;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add New Item</h2>
    <form method="post">
        <label>Category</label>
        <input type="text" name="category" placeholder="Enter category (e.g. Electronics)" required>

        <label>Item Name</label>
        <input type="text" name="name" required>

        <label>Description</label>
        <textarea name="description" rows="3"></textarea>

        <label>Quantity</label>
        <input type="number" name="quantity" min="0" required>

        <label>Price (₹)</label>
        <input type="number" name="price" step="0.01" min="0" required>

        <button type="submit">Add Item</button>
    </form>

    <a href="index.php">← Back to Inventory</a>
</div>

</body>
</html>
