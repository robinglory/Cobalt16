<?php
include 'db_connect.php'; // Include the database connection file

$channel_id = intval($_GET['id']);

// Fetch channel info
$channel_result = $conn->query("SELECT name FROM channels WHERE id = $channel_id");
$channel = $channel_result->fetch_assoc();

// Fetch messages with correct order
$messages_result = $conn->query("SELECT username, message 
                                FROM messages 
                                WHERE channel_id = $channel_id 
                                ORDER BY created_at ASC"); // Ensure messages are ordered by creation time
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($channel['name']); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #181818;
            color: #f1f1f1;
        }
        .container {
            max-width: 800px;
            margin-top: 20px;
            background-color: #2b2b2b;
            padding: 20px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            height: 80vh; /* Set a fixed height for the container */
        }
        #messages {
            flex: 1;
            overflow-y: auto;
            margin-bottom: 20px;
        }
        .message {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #333;
            border-radius: 5px;
        }
        .message p {
            margin: 0;
        }
        .message strong {
            color: #007bff;
        }
        textarea {
            width: calc(100% - 90px); /* Adjust width to fit the button */
            background-color: #333;
            color: #f1f1f1;
            border: 1px solid #444;
        }
        button {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .form-group {
            display: flex;
            align-items: center;
        }
    </style>
    <script>
        function refreshMessages() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_message.php?channel_id=<?php echo $channel_id; ?>', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('messages').innerHTML = xhr.responseText;
                    // Scroll to bottom after updating messages
                    const messagesDiv = document.getElementById('messages');
                    messagesDiv.scrollTop = messagesDiv.scrollHeight;
                }
            };
            xhr.send();
        }

        function sendMessage() {
            const message = document.getElementById('message').value;
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'send_message.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('message').value = '';
                    refreshMessages(); // Refresh messages after sending
                }
            };
            xhr.send('channel_id=<?php echo $channel_id; ?>&message=' + encodeURIComponent(message));
        }

        setInterval(refreshMessages, 5000); // Refresh messages every 5 seconds
    </script>
</head>
<body>
    <div class="container">
        <a href="dashboard.php" class="back-link">&larr; Back to Dashboard</a>
        <h1><?php echo htmlspecialchars($channel['name']); ?> Channel</h1>
        <div id="messages">
            <?php while ($message = $messages_result->fetch_assoc()): ?>
                <div class="message">
                    <p><strong><?php echo htmlspecialchars($message['username']); ?>:</strong> <?php echo htmlspecialchars($message['message']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="form-group">
            <textarea id="message" rows="4" placeholder="Type your message here..."></textarea>
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
</body>
</html>
