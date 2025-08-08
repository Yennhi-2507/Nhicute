<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="welcome-body">

    <div class="welcome-container">
        <h1>Chào mừng, <span class="user-name"><?php echo htmlspecialchars($_SESSION['username']); ?></span>!</h1>
        <p>Bạn đã đăng nhập thành công. Hãy khám phá trang web của chúng tôi!</p>
        
        <div class="welcome-buttons">
            <a href="index.php" class="button">Vào trang web</a>
            <a href="logout.php" class="button logout-button">Đăng xuất</a>
        </div>
    </div>

</body>
</html>