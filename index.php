<?php
include 'db.php';

<<<<<<< HEAD
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];

    if ($name && $quantity >= 0 && $price >= 0) {
        $sql = "INSERT INTO products (name, quantity, price) VALUES ('$name', $quantity, $price)";
        if ($conn->query($sql) === TRUE) {
            header("Location: " . $_SERVER['PHP_SELF']); // redirect to avoid resubmission
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    } else {
        $error = "Please fill all fields correctly.";
    }
}

// Fetch products
$sql = "SELECT * FROM products ORDER BY created_at DESC";
=======
// Fetch inventory items
$sql = "SELECT * FROM items";
>>>>>>> 0f2343101dd09dcf6b45d4c3a100256c24b31759
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inventory Management</title>
    <style>
        /* (Add the same CSS I gave you before for the table here) */
        /* plus styling for the form below */

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7fa;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
            margin: 0 auto 40px auto;
            background: white;
            box-shadow: 0 4px 10px rgb(0 0 0 / 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 15px 20px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        tr:nth-child(even) {
            background-color: #f9faff;
        }
        tr:hover {
            background-color: #e6f0ff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgb(0 0 0 / 0.1);
        }
        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #007bff;
        }
        form input[type="text"],
        form input[type="number"],
        form input[type="submit"] {
            width: 100%;
            padding: 10px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        form input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 700;
            transition: background-color 0.3s ease;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            max-width: 900px;
            margin: 0 auto 20px auto;
            color: #b00020;
            font-weight: 600;
        }

        @media (max-width: 600px) {
            /* same responsive table styles from earlier */
            body {
                padding: 10px;
            }
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            tr {
                margin-bottom: 20px;
                box-shadow: 0 4px 10px rgb(0 0 0 / 0.1);
                border-radius: 8px;
                background: white;
                padding: 15px;
            }
            td {
                padding: 10px 10px;
                text-align: right;
                position: relative;
                padding-left: 50%;
                border-bottom: 1px solid #eee;
            }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                padding-left: 10px;
                font-weight: 600;
                text-align: left;
                color: #007bff;
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }
            form input[type="text"],
            form input[type="number"],
            form input[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>Product Inventory</h1>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Quantity</th><th>Price</th><th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td data-label="ID"><?= htmlspecialchars($row['id']) ?></td>
                <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
                <td data-label="Quantity"><?= htmlspecialchars($row['quantity']) ?></td>
                <td data-label="Price"><?= htmlspecialchars($row['price']) ?></td>
                <td data-label="Created At"><?= htmlspecialchars($row['created_at']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <form method="POST" action="">
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" required />

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" min="0" required />

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" min="0" step="0.01" required />

        <input type="submit" value="Add Product" />
    </form>
=======
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
>>>>>>> 0f2343101dd09dcf6b45d4c3a100256c24b31759
</body>
</html>
