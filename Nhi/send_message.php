<?php
session_start();
include 'db.php';

header('Content-Type: application/json');
$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
    if (isset($_POST['message'])) { // Kiểm tra xem 'message' có tồn tại không
        $username = $_SESSION['username'];
        $message = trim($_POST['message']);

        if (!empty($message)) {
            $stmt = $conn->prepare("INSERT INTO chat_messages (username, message) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $message);
            
            if ($stmt->execute()) {
                $response['success'] = true;
            } else {
                $response['message'] = "Lỗi database: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $response['message'] = "Tin nhắn không được để trống.";
        }
    } else {
        $response['message'] = "Yêu cầu không hợp lệ.";
    }
} else {
    $response['message'] = "Bạn chưa đăng nhập hoặc yêu cầu không hợp lệ.";
}

echo json_encode($response);
$conn->close();
?>