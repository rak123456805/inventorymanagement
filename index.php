<?php
include 'db.php';

// Fetch inventory items
$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Inventory Items</h1>

    <h2>Add New Item</h2>
    <form action="add_item.php" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br><br>

        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>

        <input type="submit" value="Add Item">
    </form>

    <hr>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th><th>Name</th><th>Quantity</th><th>Price</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>".htmlspecialchars($row['name'])."</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['price']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No items found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
