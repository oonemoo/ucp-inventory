<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ucpinventorydata"; // Change this

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(['error' => 'Database connection failed']);
  exit;
}

$sql = "SELECT id, name FROM suppliers ORDER BY name ASC";
$result = $conn->query($sql);

$suppliers = [];

while ($row = $result->fetch_assoc()) {
  $suppliers[] = $row;
}

echo json_encode($suppliers);
$conn->close();
?>
