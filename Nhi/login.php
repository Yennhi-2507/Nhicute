<?php 
session_start(); 
include 'db.php'; 

// Khởi tạo biến lỗi để hiển thị 
$error_message = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    // Kiểm tra xem tài khoản đã tồn tại chưa 
    $sql = "SELECT * FROM users WHERE username = ?"; 
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $username); 
    $stmt->execute(); 
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) { 
        // Nếu tồn tại -> kiểm tra mật khẩu 
        $user = $result->fetch_assoc(); 
        if (password_verify($password, $user['password'])) { 
            $_SESSION['username'] = $user['username']; 
            header("Location: /Nhi/welcome.php"); 
            exit(); 
        } else { 
            $error_message = "Sai mật khẩu!"; 
        } 
    } else { 
        // Nếu chưa tồn tại -> chuyển hướng đến trang đăng ký 
        header("Location: /Nhi/register.php"); // Thay đổi tên file đăng ký của bạn tại đây 
        exit(); 
    } 
} 
?> 

<!DOCTYPE html> 
<html lang="vi"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Đăng nhập</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body class="login-body">  <div class="login-container"> 
        <h2>Đăng nhập</h2> 
        <?php 
        if (!empty($error_message)) { 
            echo "<p class='error-message'>" . $error_message . "</p>"; 
        } 
        ?> 
        <form method="POST"> 
            <label for="username">Tên đăng nhập:</label> 
            <input type="text" id="username" name="username" required> 
            <label for="password">Mật khẩu:</label> 
            <input type="password" id="password" name="password" required> 
            <button type="submit">Đăng nhập</button> 
        </form> 
        <p>Bạn chưa có tài khoản? <a href="/Nhi/register.php">Đăng ký ngay</a></p> 
    </div> 

</body> 
</html>