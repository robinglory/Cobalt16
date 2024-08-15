<?php
session_start();
include 'db_connect.php'; // Include the database connection file

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$username = htmlspecialchars($_SESSION['username']);

// Fetch channels
$channels_result = $conn->query("SELECT id, name FROM channels");

// Check if the query was successful
if (!$channels_result) {
    die("Database query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('img/bg1.png'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px; 
            margin: 100px 0 100px 100px; 
            background: rgba(43, 43, 43, 0.7); 
            padding: 50px;
            padding-left: 100px;
            padding-right: 100px;
            border-radius: 10px;
            backdrop-filter: blur(10px); 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1, h2 {
            color: #ffffff;
        }
        .btn {
            background-color: #007bff; 
            border: none;
            color: #ffffff;
            font-size: 20px; 
            padding: 8px 16px; 
        }
        .btn:hover {
            background-color: #0056b3; 
            color: #ffffff;
        }
        .btn-block {
            margin-bottom: 10px;
            width: 100%;
            display: inline-block; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Welcome, <?php echo $username; ?>!</h1>
        
        <h2>Channels</h2>
        <ul class="list-unstyled">
            <?php while ($channel = $channels_result->fetch_assoc()): ?>
                <li>
                    <a href="channel.php?id=<?php echo $channel['id']; ?>" class="btn btn-block">
                        <?php echo htmlspecialchars($channel['name']); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>

        <h2 class="mt-4">Blogs</h2>
        <a href="blogs.php" class="btn btn-block">View Blogs</a>
        
        <h2 class="mt-4">Quizzes</h2>
        <a href="quiz.php" class="btn btn-block">Take a Quiz</a>

        <h2 class="mt-4">Ask the AI Chatbot</h2>
        <a href="ai_chatbot.php" class="btn btn-block">Ask a Question</a>

        <a href="logout.php" class="btn btn-block" style="background-color: #dc3545;">Logout</a>
    </div>
</body>
</html>
