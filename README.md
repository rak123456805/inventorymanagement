# 📦 Inventory Management System

A web-based Inventory Management System built with **PHP**, **MySQL (MariaDB)**, HTML, and CSS. It allows users to manage product stock by adding, updating, deleting, and clearing inventory items through a clean and responsive user interface.

---

## 🌐 Features

- Add new inventory items with name, quantity, price, and category
- View items in a styled HTML table
- Update existing items
- Delete specific items
- Clear all inventory data
- Real-time feedback messages for all actions
- Professional UI with modern CSS styling

---

## 🛠️ Technologies Used

- **Frontend:** HTML5, CSS3
- **Backend:** PHP
- **Database:** MySQL (MariaDB via XAMPP)
- **Server:** Apache via XAMPP

---

## 📁 Project Structure

inventory/
├── index.php # Main frontend with inventory operations
├── db.php # Database connection
├── style.css # CSS file for styling
├── README.md # Project documentation
└── inventorydb.sql # (optional) Database dump file

---

## 🧰 Setup Instructions

### 🔧 Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) (Apache + MariaDB)
- Git (optional, for cloning repo)

---

### 🖥️ Local Development Setup

1. **Start Apache and MySQL** from XAMPP Control Panel.

2. **Import Database**:
   - Open `phpMyAdmin` at [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Create a new database: `inventorydb`
   - Run the following SQL:

```sql
CREATE TABLE IF NOT EXISTS inventory (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  category VARCHAR(50)
);
