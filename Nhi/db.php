<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db"; // đúng tên database bà đã tạo

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
