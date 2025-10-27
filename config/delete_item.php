<?php
$conn = new mysqli("localhost", "root", "", "ucpinventorydata");

if (isset($_POST['id'])) {
  $id = intval($_POST['id']);
  $conn->query("DELETE FROM inventory_items WHERE id = $id");
  echo "Item deleted successfully.";
} else {
  echo "Invalid ID.";
}
?>
