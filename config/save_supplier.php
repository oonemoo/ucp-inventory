<?php
header('Content-Type: application/json');

$host = "localhost";
$username = "root";
$password = "";
$dbname = "ucpinventorydata";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  echo json_encode(['success' => false, 'message' => 'DB connection failed']);
  exit;
}

$id = isset($_POST['id']) && $_POST['id'] !== '' ? intval($_POST['id']) : null;
$name = $_POST['name'] ?? '';
$category = $_POST['category'] ?? '';
$location = $_POST['location'] ?? '';
$phone = $_POST['phone'] ?? '';
$telnum = $_POST['telnum'] ?? '';
$email = $_POST['email'] ?? '';
$status = $_POST['status'] ?? '';

if ($id) {
  // UPDATE
  $stmt = $conn->prepare("
    UPDATE suppliers
    SET name = ?, category = ?, location = ?, phone = ?, telnum = ?, email = ?, status = ?
    WHERE id = ?
  ");
  $stmt->bind_param("sssssssi", $name, $category, $location, $phone, $telnum, $email, $status, $id);
  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Supplier updated']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Update failed']);
  }
  $stmt->close();
} else {
  // INSERT
  $stmt = $conn->prepare("
    INSERT INTO suppliers (name, category, location, phone, telnum, email, status)
    VALUES (?, ?, ?, ?, ?, ?, ?)
  ");
  $stmt->bind_param("sssssss", $name, $category, $location, $phone, $telnum, $email, $status);
  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Supplier added']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Insert failed']);
  }
  $stmt->close();
}

$conn->close();
?>
