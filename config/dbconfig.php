<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Make sure to replace with your actual username
$password = ""; // Make sure to replace with your actual password
$dbname = "InventoryData"; // Replace with your database name

// Create connection
$conn = new mysqli("localhost", "root", "", "InventoryData");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data sent via AJAX POST
// Use 'isset' to check if the data exists before accessing it
$product_sku = isset($_POST['product_sku']) ? $_POST['product_sku'] : null;
$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : null;
$product_quantity = isset($_POST['product_quantity']) ? $_POST['product_quantity'] : null;
$product_date_received = isset($_POST['product_date_received']) ? $_POST['product_date_received'] : null;
$product_location = isset($_POST['product_location']) ? $_POST['product_location'] : null;

// Use a prepared statement to prevent SQL injection
$sql = "INSERT INTO  inventoryitems (sku, product_name, quantity, date_received, product_location) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind the parameters to the statement
$stmt->bind_param("issss", $product_sku, $product_name, $product_quantity, $product_date_received, $product_location);

// Execute the statement and check for success
if ($stmt->execute()) {
    echo "New record added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>