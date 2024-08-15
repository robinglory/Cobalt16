<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$blog_id = intval($_GET['id']);

// Fetch blog details
$stmt = $conn->prepare("SELECT blogs.title, blogs.content, users.username AS author, blogs.created_at
                         FROM blogs JOIN users ON blogs.author_id = users.id
                         WHERE blogs.id = ?");
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($title, $content, $author, $created_at);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #181818;
            color: #f1f1f1;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background-color: #2b2b2b;
            padding: 20px;
            border-radius: 8px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .blog-title {
            color: #007bff;
        }
        .blog-title:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($title); ?></h1>
        <p><small>By <?php echo htmlspecialchars($author); ?> on <?php echo htmlspecialchars($created_at); ?></small></p>
        <div class="blog-content">
            <?php echo nl2br(htmlspecialchars($content)); ?>
        </div>
        <a href="blogs.php" class="btn btn-primary">Back to Blogs</a>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</body>
</html>
