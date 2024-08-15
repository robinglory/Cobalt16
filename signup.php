<?php
include 'db_connect.php'; 
$error_message = ''; 
$success_message = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    if (preg_match('/\d/', $username)) {
        $error_message = "Username should not contain any numbers.";
    }

   
    if (strlen($password) < 8) {
        $error_message = "Password must be at least 8 characters long.";
    }

    if (empty($error_message)) {
       
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            $success_message = "Registration successful!";
            
            header("Location: login.php");
            exit();
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #181818;
            color: #f1f1f1;
        }
        .container {
            max-width: 600px;
            margin-top: 150px; 
            background-color: #2b2b2b;
            padding: 50px; 
            border-radius: 8px;
        }
        .form-control {
            background-color: #333;
            color: #f1f1f1;
        }
        .form-control:focus {
            background-color: #444;
            color: #f1f1f1;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .success {
            color: #4caf50;
            margin-bottom: 20px;
            font-size: 20px;
        }
        .error {
            color: #ff6b6b;
            margin-bottom: 20px;
            font-size: 20px;
        }
        .form-group {
            margin-bottom: 30px;
        }
        #submit {
            margin-bottom: 10px;
            border-radius: 10px;
            padding: 15px;
        }
    </style>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var message = "";

            if (password.length < 8) {
                message += "Password must be at least 8 characters long.<br>";
            }

            document.getElementById("password-error").innerHTML = message;
        }

        function validateUsername() {
            var username = document.getElementById("username").value;
            var message = "";

            if (/\d/.test(username)) {
                message += "Username should not contain any numbers.<br>";
            }

            document.getElementById("username-error").innerHTML = message;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Sign Up</h2>
        <form action="signup.php" method="POST">
            <?php if (!empty($success_message)): ?>
                <p class="success"><?php echo htmlspecialchars($success_message); ?></p>
            <?php endif; ?>
            <?php if (!empty($error_message)): ?>
                <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
            <?php endif; ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required onkeyup="validateUsername()">
                <div id="username-error" class="error"></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required onkeyup="validatePassword()">
                <div id="password-error" class="error"></div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="submit">Sign Up</button>
            <p class="text-center">Already have an account? <a href="login.php" class="text-info">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
