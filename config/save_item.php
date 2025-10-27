<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ucpinventorydata";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die(json_encode(['error' => 'Connection failed']));
}

$id = $_POST['id'] ?? null;
$sku = $_POST['sku'];
$product_name = $_POST['product_name'];
$description = $_POST['description'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$date_purchased = $_POST['date_purchased'];
$warranty = $_POST['warranty'];
$supplier = $_POST['supplier'];
$department = $_POST['department'];

if ($id) {
  // Update existing
  $stmt = $conn->prepare("UPDATE inventory_items SET sku=?, product_name=?, description=?, category=?, quantity=?, date_purchased=?, warranty_validity=?, supplier=?, department_deployed=? WHERE id=?");
  $stmt->bind_param("isssissssi", $sku, $product_name, $description, $category, $quantity, $date_purchased, $warranty, $supplier, $department, $id);
  $stmt->execute();
  $stmt->close();
  echo json_encode(['message' => 'Item updated successfully']);
} else {
  // Insert new
  $stmt = $conn->prepare("INSERT INTO inventory_items (sku, product_name, description, category, quantity, date_purchased, warranty_validity, supplier, department_deployed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("isssissss", $sku, $product_name, $description, $category, $quantity, $date_purchased, $warranty, $supplier, $department);
  $stmt->execute();
  $stmt->close();
  echo json_encode(['message' => 'Item added successfully']);
}

$conn->close();
?>
