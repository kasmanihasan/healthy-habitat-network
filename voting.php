<?php
include('db.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];

    // SQL query to insert the vote
    $sql = "INSERT INTO votes (product_id) VALUES ('$product_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Vote recorded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Redirect back to the product display page
    header("Location: display_products.php");
    exit();
}

$conn->close();
?>
