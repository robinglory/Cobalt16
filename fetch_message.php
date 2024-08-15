<?php
include 'db_connect.php'; // Include the database connection file

$channel_id = intval($_GET['channel_id']);

// Fetch messages with correct order
$messages_result = $conn->query("SELECT users.username, messages.message 
                                FROM messages 
                                JOIN users ON messages.user_id = users.id 
                                WHERE messages.channel_id = $channel_id 
                                ORDER BY messages.created_at ASC"); // Ensure messages are ordered by creation time

while ($message = $messages_result->fetch_assoc()) {
    echo '<div class="message">';
    echo '<p><strong>' . htmlspecialchars($message['username']) . ':</strong> ' . htmlspecialchars($message['message']) . '</p>';
    echo '</div>';
}
?>
