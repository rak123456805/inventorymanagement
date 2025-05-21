<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Inventory Management System</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
      margin: 0; padding: 0;
    }
    .container {
      max-width: 960px;
      margin: 50px auto;
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #222;
      margin-bottom: 30px;
    }
    form {
      display: grid;
      gap: 15px;
      margin-bottom: 30px;
    }
    input, textarea, button {
      font-size: 1rem;
      padding: 12px 14px;
      border-radius: 8px;
      border: 1px solid #ccc;
      width: 100%;
      box-sizing: border-box;
      transition: border-color 0.3s;
    }
    input:focus, textarea:focus {
      border-color: #007bff;
      outline: none;
    }
    button {
      background-color: #007bff;
      border: none;
      color: #fff;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s;
      padding: 14px 20px;
    }
    button:hover {
      background-color: #0056b3;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fafafa;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      border-radius: 8px;
      overflow: hidden;
    }
    th, td {
      padding: 14px 12px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #007bff;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    tr:hover {
      background-color: #e9f0ff;
    }
    .actions form {
      display: inline-block;
      margin: 0 4px;
    }
    .actions button {
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 0.9rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .edit-btn {
      background-color: #28a745;
      color: white;
    }
    .edit-btn:hover {
      background-color: #1e7e34;
    }
    .delete-btn {
      background-color: #dc3545;
      color: white;
    }
    .delete-btn:hover {
      background-color: #a71d2a;
    }
    .clear-btn {
      background-color: #6c757d;
      color: white;
      margin-bottom: 25px;
      width: 150px;
      display: block;
      text-align: center;
    }
    .clear-btn:hover {
      background-color: #565e64;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Inventory Management System</h2>

  <form method="POST" action="db.php" id="add-form">
    <input type="hidden" name="id" id="item-id" />
    <input type="text" name="name" id="name" placeholder="Item Name" required />
    <textarea name="description" id="description" placeholder="Description" rows="2"></textarea>
    <input type="number" name="quantity" id="quantity" placeholder="Quantity" min="0" required />
    <input type="number" name="price" id="price" placeholder="Price" min="0" step="0.01" required />
    <button type="submit" name="add" id="add-btn">Add Item</button>
    <button type="submit" name="update" id="update-btn" style="display:none; background-color:#28a745;">Update Item</button>
    <button type="button" id="cancel-btn" style="display:none; margin-top:10px;">Cancel</button>
  </form>

  <form method="POST" action="db.php">
    <button type="submit" name="clear" class="clear-btn">Clear All Items</button>
  </form>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price (₹)</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM items ORDER BY id DESC");
      while ($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td><?= htmlspecialchars($row['quantity']) ?></td>
        <td><?= htmlspecialchars(number_format($row['price'], 2)) ?></td>
        <td class="actions">
          <button class="edit-btn" 
            data-id="<?= $row['id'] ?>"
            data-name="<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>"
            data-description="<?= htmlspecialchars($row['description'], ENT_QUOTES) ?>"
            data-quantity="<?= $row['quantity'] ?>"
            data-price="<?= $row['price'] ?>"
          >Edit</button>
          <form method="POST" action="db.php" style="display:inline;">
            <input type="hidden" name="id" value="<?= $row['id'] ?>" />
            <button type="submit" name="delete" class="delete-btn" onclick="return confirm('Delete this item?');">Delete</button>
          </form>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<script>
  // Handle Edit button click
  document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', () => {
      // Populate form fields with item data
      document.getElementById('item-id').value = button.getAttribute('data-id');
      document.getElementById('name').value = button.getAttribute('data-name');
      document.getElementById('description').value = button.getAttribute('data-description');
      document.getElementById('quantity').value = button.getAttribute('data-quantity');
      document.getElementById('price').value = button.getAttribute('data-price');

      // Toggle buttons visibility
      document.getElementById('add-btn').style.display = 'none';
      document.getElementById('update-btn').style.display = 'inline-block';
      document.getElementById('cancel-btn').style.display = 'inline-block';
    });
  });

  // Cancel update and clear form
  document.getElementById('cancel-btn').addEventListener('click', () => {
    document.getElementById('add-form').reset();
    document.getElementById('item-id').value = '';
    document.getElementById('add-btn').style.display = 'inline-block';
    document.getElementById('update-btn').style.display = 'none';
    document.getElementById('cancel-btn').style.display = 'none';
  });
</script>

</body>
</html>
