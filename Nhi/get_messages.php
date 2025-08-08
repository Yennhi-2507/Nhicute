<?php
session_start();
include 'db.php';

header('Content-Type: application/json');

$messages = [];
$sql = "SELECT username, message, created_at FROM chat_messages ORDER BY created_at ASC LIMIT 50";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

echo json_encode($messages);
$conn->close();
?>