<?php
$servername = "localhost"; // or your server name (127.0.0.1 for local)
$username = "root";        // your MySQL username
$password = "";            // your MySQL password (default is empty for local server)
$dbname = "healthy_habitat_network";  // the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
