<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname= "InventoryData";

// Connection
$conn = mysqli_connect($servername, 
               $username, $password, $dbname);

// Check if connection is 
// Successful or not
if (!$conn) {
  die("Connection failed: " 
      . mysqli_connect_error());
}
echo "Connected successfully";
?>