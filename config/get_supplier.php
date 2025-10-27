<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ucpinventorydata";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  die(json_encode(['error' => 'DB connection failed']));
}

if (!isset($_GET['id'])) {
  die(json_encode(['error' => 'No ID provided']));
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM suppliers WHERE id = $id LIMIT 1";
$res = $conn->query($sql);
if ($res && $res->num_rows > 0) {
  $row = $res->fetch_assoc();
  echo json_encode($row);
} else {
  echo json_encode(['error' => 'Not found']);
}

$conn->close();
?>
