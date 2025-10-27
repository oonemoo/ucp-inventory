<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ucpinventorydata";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {
  $data[] = [
    $row['name'],
    $row['category'],
    $row['location'],
    $row['phone'],
    $row['telnum'],
    $row['email'],
    $row['status'],
    '<button class="btn btn-sm btn-warning edit-btn" data-id="' . $row['id'] . '">Edit</button>
     <button class="btn btn-sm btn-danger delete-btn" data-id="' . $row['id'] . '">Delete</button>'
  ];
}

echo json_encode(['data' => $data]);

$conn->close();
?>
