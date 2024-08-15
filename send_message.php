<?php
include 'db_connect.php'; // Include the database connection file

session_start();

$channel_id = intval($_POST['channel_id']);
$message_content = $_POST['message'];
$user_id = $_SESSION['user_id'];

if (!empty($message_content)) {
    // Insert message
    $stmt = $conn->prepare("INSERT INTO messages (channel_id, user_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $channel_id, $user_id, $message_content);

    if ($stmt->execute()) {
        echo "Message sent!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
