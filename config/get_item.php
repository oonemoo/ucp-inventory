<?php
$conn = new mysqli("localhost", "root", "", "ucpinventorydata");

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $result = $conn->query("SELECT * FROM inventory_items WHERE id = $id");
  echo json_encode($result->fetch_assoc());
}
?>
