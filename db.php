<?php
$host = 'localhost';
$db = 'library_db';
$user = 'root'; // Default XAMPP/WAMP username
$pass = '';     // Default XAMPP/WAMP password is empty

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
