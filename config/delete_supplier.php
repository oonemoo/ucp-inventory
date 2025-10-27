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

if (isset($_POST['id'])) {
  $id = intval($_POST['id']);
  $stmt = $conn->prepare("DELETE FROM suppliers WHERE id = ?");
  $stmt->bind_param("i", $id);
  if ($stmt->execute()) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'message' => 'Delete failed']);
  }
  $stmt->close();
} else {
  echo json_encode(['success' => false, 'message' => 'No ID provided']);
}

$conn->close();
?>
