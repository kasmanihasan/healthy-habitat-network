<?php
// Include the database connection
include('db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $age_group = $conn->real_escape_string($_POST['age_group']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $area_id = $conn->real_escape_string($_POST['area_id']);
    $interest = $conn->real_escape_string($_POST['interest']);
    $registered_date = date('Y-m-d H:i:s');

    // SQL query to insert data into residents table
    $sql = "INSERT INTO residents (first_name, last_name, age_group, gender, area_id, interest, registered_date)
            VALUES ('$first_name', '$last_name', '$age_group', '$gender', '$area_id', '$interest', '$registered_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
