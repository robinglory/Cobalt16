<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .timeline-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline-row {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .timeline {
            flex-shrink: 0;
            text-align: center;
            margin-right: 20px;
            width: 80px;
        }

        .timeline-date {
            background-color: #ff5c5c;
            color: white;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .timeline-line {
            width: 4px;
            background-color: #6c757d;
            height: 100%;
            margin: 0 auto;
        }

        .notification-list {
            flex-grow: 1;
        }

        .notification-item {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .sender {
            color: #007bff;
        }

        .time {
            color: #6c757d;
            font-size: 12px;
        }

        .notification-body {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .notification-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 5px 10px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .view-comment {
            background-color: #28a745;
            color: white;
        }

        .like {
            background-color: #ff5c5c;
            color: white;
        }

        .login-prompt {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="timeline-container">
        <?php
        session_start();
        include 'db_connect.php'; // Include the database connection file

        // Fetch posts from the database
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $last_date = '';

            while ($row = $result->fetch_assoc()) {
                $post_date = date('d M. Y', strtotime($row['created_at']));
                $user_id = $row['user_id'];
                $user_result = $conn->query("SELECT * FROM users WHERE id = $user_id");
                $user = $user_result->fetch_assoc();

                // Check if we need to start a new timeline row
                if ($post_date !== $last_date) {
                    if ($last_date !== '') {
                        echo '</div>'; // Close previous timeline-row
                    }
                    echo '<div class="timeline-row">';
                    echo '    <div class="timeline">';
                    echo '        <div class="timeline-date">' . htmlspecialchars($post_date) . '</div>';
                    echo '        <div class="timeline-line"></div>';
                    echo '    </div>';
                    echo '    <div class="notification-list">';
                    $last_date = $post_date;
                }

                // Display the post
                echo '        <div class="notification-item">';
                echo '            <div class="notification-header">';
                echo '                <span class="sender">' . htmlspecialchars($user['username']) . '</span> posted';
                echo '                <span class="time">' . date('H:i', strtotime($row['created_at'])) . '</span>';
                echo '            </div>';
                echo '            <div class="notification-body">' . htmlspecialchars($row['content']) . '</div>';
                echo '            <div class="notification-actions">';

                if (isset($_SESSION['user_id'])) {
                    echo '                <button class="btn view-comment">Comment</button>';
                    echo '                <button class="btn like">Like</button>';
                } else {
                    echo '                <button class="btn view-comment" disabled>Comment (Login Required)</button>';
                    echo '                <button class="btn like" disabled>Like (Login Required)</button>';
                }

                echo '            </div>';
                echo '        </div>';
            }

            // Close the last timeline row
            if ($last_date !== '') {
                echo '    </div>'; // Close notification-list
                echo '</div>'; // Close timeline-row
            }
        } else {
            echo '<p>No posts found.</p>';
        }
        ?>
    </div>

    <?php if (!isset($_SESSION['user_id'])): ?>
        <div class="login-prompt">
            <p>You need to <a href="login.php">login</a> to post or comment.</p>
        </div>
    <?php endif; ?>
</body>
</html>
