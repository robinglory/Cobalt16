<?php
// Database credentials
$host = 'localhost'; // or your database server address
$dbname = 'atom';
$username = 'admin';
$password = 'root';

// Create a new MySQLi instance
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set to UTF-8
$conn->set_charset("utf8");

?>
