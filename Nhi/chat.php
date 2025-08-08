<?php
session_start();
include 'db.php';

// Kiểm tra xem người dùng đã đăng nhập chưa
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
    <title>Cộng đồng chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .chat-container {
            width: 80%;
            max-width: 600px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 80vh;
        }
        .chat-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 1.2em;
        }
        .chat-messages {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            border-bottom: 1px solid #eee;
        }
        .message-item {
            margin-bottom: 15px;
        }
        .message-item .username {
            font-weight: bold;
            color: #333;
        }
        .message-item .timestamp {
            font-size: 0.8em;
            color: #888;
            margin-left: 10px;
        }
        .message-item .message-text {
            background-color: #e9e9e9;
            padding: 10px;
            border-radius: 5px;
            word-wrap: break-word;
        }
        .chat-form {
            padding: 15px;
            display: flex;
        }
        .chat-form input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .chat-form button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            Cộng đồng chat của bạn
        </div>
        <div class="chat-messages" id="chat-messages">
            </div>
        <form class="chat-form" id="chat-form">
            <input type="text" id="message-input" name="message" placeholder="Nhập tin nhắn..." autocomplete="off">
            <button type="submit">Gửi</button>
        </form>
    </div>

    <script>
    const chatForm = document.getElementById('chat-form');
    const messageInput = document.getElementById('message-input');
    const chatMessagesContainer = document.getElementById('chat-messages');

    // Hàm để tải tin nhắn
    function fetchMessages() {
        fetch('get_messages.php')
        .then(response => response.json())
        .then(messages => {
            chatMessagesContainer.innerHTML = '';
            messages.forEach(msg => {
                const messageItem = document.createElement('div');
                messageItem.className = 'message-item';
                messageItem.innerHTML = `
                    <div class="username">${msg.username} <span class="timestamp">${msg.created_at}</span></div>
                    <div class="message-text">${msg.message}</div>
                `;
                chatMessagesContainer.appendChild(messageItem);
            });
            chatMessagesContainer.scrollTop = chatMessagesContainer.scrollHeight;
        })
        .catch(error => console.error('Lỗi khi tải tin nhắn:', error));
    }

    // Gửi tin nhắn
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const message = messageInput.value.trim();
        if (message === '') return;

        const formData = new FormData();
        formData.append('message', message);
        
        fetch('send_message.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            // Kiểm tra xem phản hồi có phải là JSON không
            const contentType = response.headers.get("content-type");
            if (contentType && contentType.indexOf("application/json") !== -1) {
                return response.json();
            } else {
                // Nếu không phải JSON, trả về lỗi
                throw new TypeError("Phản hồi từ server không phải JSON.");
            }
        })
        .then(data => {
            if (data.success) {
                messageInput.value = '';
                fetchMessages(); // Tải lại tin nhắn sau khi gửi thành công
            } else {
                alert('Gửi tin nhắn thất bại: ' + data.message);
            }
        })
        .catch(error => console.error('Lỗi khi gửi tin nhắn:', error));
    });

    // Tải tin nhắn lần đầu và cứ sau 3 giây
    fetchMessages();
    setInterval(fetchMessages, 3000); 
</script>
</body>
</html>