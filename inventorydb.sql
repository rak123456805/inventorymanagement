-- Create the database
CREATE DATABASE IF NOT EXISTS inventorydb;
USE inventorydb;

-- Create the products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO products (name, quantity, price) VALUES
('Laptop', 10, 75000.00),
('Keyboard', 20, 1500.50),
('Mouse', 30, 799.99),
('Monitor', 5, 12500.00),
('Printer', 3, 10000.00);
