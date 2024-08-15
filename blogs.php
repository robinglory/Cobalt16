<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch all blogs
$blogs_result = $conn->query("SELECT blogs.id, blogs.title, blogs.created_at, users.username AS author
                              FROM blogs JOIN users ON blogs.author_id = users.id
                              ORDER BY blogs.created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
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
        .blog-title {
            color: #007bff;
        }
        .blog-title:hover {
            text-decoration: underline;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .blog-item {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Blogs</h1>
        <?php while ($blog = $blogs_result->fetch_assoc()): ?>
            <div class="blog-item">
                <h2 class="blog-title"><a href="blog.php?id=<?php echo $blog['id']; ?>"><?php echo htmlspecialchars($blog['title']); ?></a></h2>
                <p><small>By <?php echo htmlspecialchars($blog['author']); ?> on <?php echo htmlspecialchars($blog['created_at']); ?></small></p>
            </div>
        <?php endwhile; ?>
        <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
</body>
</html>
