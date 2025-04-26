<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $area_name = $_POST['area_name'];

    $sql = "INSERT INTO areas (area_name) VALUES ('$area_name')";
    if ($conn->query($sql) === TRUE) {
        echo "New area added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Area</title>
</head>
<body>
    <h1>Add New Area</h1>
    <form method="POST">
        <label for="area_name">Area Name:</label>
        <input type="text" id="area_name" name="area_name" required>
        <button type="submit">Add Area</button>
    </form>
</body>
</html>
