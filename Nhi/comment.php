<?php
session_start();
include 'db.php'; 

// Xử lý bình luận khi form được gửi. Lệnh này chỉ chạy khi có request POST.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_comment'])) {
    
    // Đặt header để trình duyệt biết chúng ta trả về dữ liệu JSON
    header('Content-Type: application/json');
    $response = ['success' => false, 'message' => ''];

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $comment = trim($_POST['comment']);

        if (!empty($comment)) {
            $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $comment);
            
            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = 'Bình luận của bạn đã được gửi thành công!';
            } else {
                $response['message'] = "Lỗi khi gửi bình luận: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $response['message'] = "Bình luận không được để trống!";
        }
    } else {
        $response['message'] = "Bạn phải đăng nhập để bình luận.";
    }

    echo json_encode($response);
    $conn->close();
    exit(); // Rất quan trọng để dừng script sau khi gửi phản hồi JSON
}

// Lấy danh sách bình luận để hiển thị. Lệnh này chỉ chạy khi trang được tải.
$comments_query = "SELECT username, comment, created_at FROM comments ORDER BY created_at DESC";
$comments_result = $conn->query($comments_query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Bình Luận Góp Ý</title>
    <style>
        .comments-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            font-family: Arial, sans-serif;
        }
        .comment-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .comment-form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            min-height: 80px;
        }
        .comment-form button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .comments-list {
            margin-top: 20px;
        }
        .comment-item {
            background-color: #fff;
            padding: 15px;
            border-left: 3px solid #007BFF;
            border-radius: 5px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="comments-container">
    <h3>Bình luận góp ý</h3>

    <?php if (isset($_SESSION['username'])): ?>
        <form id="comment-form" class="comment-form">
            <textarea name="comment" placeholder="Viết bình luận của bạn..." required></textarea>
            <button type="submit" name="submit_comment">Gửi bình luận</button>
        </form>
    <?php else: ?>
        <p>Bạn phải đăng nhập để bình luận. <a href="login.php">Đăng nhập ngay</a></p>
    <?php endif; ?>

    <div class="comments-list">
        <?php
        if ($comments_result->num_rows > 0) {
            while($row = $comments_result->fetch_assoc()) {
                echo "<div class='comment-item'>";
                echo "<h4>" . htmlspecialchars($row['username']) . "</h4>";
                echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
                echo "<span>" . $row['created_at'] . "</span>";
                echo "</div>";
            }
        } else {
            echo "<p>Chưa có bình luận nào.</p>";
        }
        ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.getElementById('comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault(); // Ngăn form tải lại trang
            
            const formData = new FormData(commentForm);
            
            // Gửi dữ liệu đến chính file này
            fetch('comments.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    window.location.reload(); // Tải lại trang để thấy bình luận mới
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi gửi bình luận.');
            });
        });
    }
});
</script>

</body>
</html>
<?php
$conn->close();
?>