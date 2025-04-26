<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "healthy_habitat_network");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resident Registration</title>
    <style>
        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
        }

        label, input, select, textarea {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            width: auto;
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Resident Registration</h2>

<form action="register_resident.php" method="POST">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" id="first_name" required>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" id="last_name" required>

    <label for="age_group">Age Group:</label>
    <select name="age_group" id="age_group" required>
        <option value="18-25">18-25</option>
        <option value="26-35">26-35</option>
        <option value="36-45">36-45</option>
        <option value="46+">46+</option>
    </select>

    <label for="gender">Gender:</label>
    <select name="gender" id="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>

    <label for="area_id">Select Area:</label>
    <select name="area_id" id="area_id" required>
        <option value="">-- Select Area --</option>
        <?php
        $result = $conn->query("SELECT * FROM areas");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        ?>
    </select>

    <label for="interest">Areas of Interest:</label>
    <textarea name="interest" id="interest" placeholder="Nutrition, Fitness, etc." required></textarea>

    <input type="submit" value="Register">
</form>

</body>
</html>
