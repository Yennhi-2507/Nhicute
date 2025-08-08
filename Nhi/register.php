<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">

    <div class="login-container">
        <h2>Đăng ký tài khoản</h2>
        <?php
        session_start();
        include 'db.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Kiểm tra username hoặc email đã tồn tại chưa
            $check_sql = "SELECT id FROM users WHERE username = ? OR email = ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("ss", $username, $email);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
                echo "<p class='error-message'>Tên đăng nhập hoặc email đã tồn tại!</p>";
            } else {
                // Mã hóa mật khẩu trước khi lưu vào DB
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Chuẩn bị câu lệnh SQL để thêm người dùng mới
                $insert_sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $insert_stmt = $conn->prepare($insert_sql);
                $insert_stmt->bind_param("sss", $username, $email, $hashedPassword);

                if ($insert_stmt->execute()) {
                    // Đăng ký thành công, tự động đăng nhập và chuyển hướng
                    $_SESSION['username'] = $username;
                    header("Location: welcome.php");
                    exit();
                } else {
                    echo "<p class='error-message'>Lỗi khi đăng ký: " . $insert_stmt->error . "</p>";
                }
            }
        }
        ?>

        <form method="POST">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Đăng ký</button>
        </form>
        <p class="link-to-login">Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
    </div>

</body>
</html>