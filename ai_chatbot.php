<?php
session_start();
include 'db_connect.php'; // Include the database connection file

// Initialize chat history with a greeting if it is not set
if (!isset($_SESSION['chat_history'])) {
    $_SESSION['chat_history'] = [
        ['ai' => 'Hi! How can I assist you with nuclear energy today?']
    ];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = trim($_POST['question']);
    $bot_reply = '';

    $conn = new mysqli('localhost', 'root', '', 'atom');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT response FROM ai_responses WHERE keyword = ?");
    $stmt->bind_param('s', $question);
    $stmt->execute();
    $stmt->bind_result($response);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    if ($response) {
        $bot_reply = $response;
    } else {
        $bot_reply = "Sorry, I couldn't understand your question.";
    }

    // Add the user question and AI response to chat history
    $_SESSION['chat_history'][] = ['user' => $question];
    $_SESSION['chat_history'][] = ['ai' => $bot_reply];
}

// Fetch keywords from ai_responses table
$conn = new mysqli('localhost', 'root', '', 'atom');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$keywords = [];
$sql = "SELECT keyword FROM ai_responses LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $keywords[] = $row['keyword'];
    }
}

$conn->close();

// Reset chat history if the page is refreshed with a reset parameter
if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    $_SESSION['chat_history'] = [
        ['ai' => 'Hi! How can I assist you with nuclear energy today?']
    ];
    header("Location: ai_chatbot.php"); // Redirect to clear the URL parameter
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Chatbot</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .chatbox {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 8px;
            max-height: 500px;
            overflow-y: auto;
            margin-bottom: 20px;
        }
        .message-wrapper {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .message {
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
        }
        .message.ai {
            background-color: #007bff;
            color: #fff;
            text-align: left;
            margin-left: 10px;
        }
        .message.user {
            background-color: #6c757d;
            color: #fff;
            text-align: right;
            margin-right: 10px;
        }
        .message-wrapper.ai {
            justify-content: flex-start;
        }
        .message-wrapper.user {
            justify-content: flex-end;
        }
        .message img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        textarea {
            resize: none;
            background-color: #ffffff;
            color: #343a40;
            border: 1px solid #ced4da;
            padding: 10px;
            width: calc(100% - 90px); /* Adjust width to fit the button */
            margin-right: 10px; /* Space between textarea and button */
        }
        textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .form-group {
            display: flex;
            align-items: center;
        }
        .btn-light {
            color: #343a40;
            border: 1px solid #ced4da;
        }
        .btn-light:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body style="background-color:#F0ECE5;">
    <div class="container">
        <h1>Ask Chatbot</h1>
        <div class="chatbox">
            <!-- Display chat history -->
            <?php
            foreach ($_SESSION['chat_history'] as $chat) {
                if (isset($chat['ai'])) {
                    echo '<div class="message-wrapper ai"><img src="img/chatbot.jpg" alt="AI" style="height:50px ; width:50px ;"><div class="message ai" >' . htmlspecialchars($chat['ai']) . '</div></div>';
                }
                if (isset($chat['user'])) {
                    echo '<div class="message-wrapper user"><div class="message user">' . htmlspecialchars($chat['user']) . '</div><img src="img/user.png" style="height:50px; width:50px; alt="User"></div>';
                }
            }
            ?>
        </div>
        <form method="POST" action="">
            <div class="form-group">
                <textarea name="question" id="question" rows="3" class="form-control" required placeholder="Type your question here..."></textarea>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>

        <!-- Display keyword suggestions -->
        <?php if (!empty($keywords)): ?>
            <div style="margin-top: 10px;">
                <strong>Try these keywords:</strong><br>
                <?php foreach ($keywords as $keyword): ?>
                    <button type="button" class="btn btn-light btn-sm mt-2" onclick="document.getElementById('question').value = '<?php echo htmlspecialchars($keyword); ?>';">
                        <?php echo htmlspecialchars($keyword); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Reset chat history button -->
        <a href="?reset=true" class="btn btn-secondary mt-3">Reset Chat</a>
    </div>
</body>
</html>
