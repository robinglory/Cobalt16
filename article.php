<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atom";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if article ID is set in the URL
if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);
    
    // Fetch article from the database, including the full content
    $sql = "SELECT title, content, image_url FROM articles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row["title"];
        $content = $row["content"];
        $image_url = $row["image_url"];
    } else {
        echo "Article not found.";
        exit;
    }
} else {
    echo "No article ID provided.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <!-- <link rel="stylesheet" href="nav.css"> Include nav CSS -->
    <style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #0F1035;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Article container */
        .article-container {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 90%; /* Use percentage for responsiveness */
            width: 100%;
            padding: 20px;
            text-align: center;
            margin: 20px auto;
            background-color: #1c1e3a;
        }

        /* Title styles */
        .article-container h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #fff;
        }

        /* Image styles */
        .article-image {
            width: 100%;
            max-width: 500px; /* Limits maximum image width */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Content styles */
        .article-content {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #fff;
            text-align: justify;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .article-container h1 {
                font-size: 2rem;
            }
            .article-content {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .article-container h1 {
                font-size: 1.5rem;
            }
            .article-content {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- ?php include 'nav.php'; ?>  -->

    <!-- Article Content -->
    <div class="article-container">
        <h1><?php echo htmlspecialchars($title); ?></h1>
        <img src="<?php echo htmlspecialchars($image_url); ?>" alt="<?php echo htmlspecialchars($title); ?>" class="article-image">
        <div class="article-content">
            <?php echo nl2br(htmlspecialchars($content)); ?>
        </div>
    </div>
</body>
</html>