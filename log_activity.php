<?php
include 'dbconfig.php'; 

$user_id = $_POST['user_id'];
$action = $_POST['action'];
$page_url = $_POST['page_url'];
$ip_address = $_SERVER['REMOTE_ADDR'];

$sql = "INSERT INTO user_activity_log (user_id, action, page_url, ip_address)
        VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $user_id, $action, $page_url, $ip_address);
$stmt->execute();
?>