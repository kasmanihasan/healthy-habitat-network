<?php
include('db.php'); // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $product_name = $conn->real_escape_string($_POST['product_name']);
    $product_description = $conn->real_escape_string($_POST['product_description']);
    $product_price = $conn->real_escape_string($_POST['product_price']);

    // SQL query to insert new product
    $sql = "INSERT INTO products (product_name, product_description, product_price) 
            VALUES ('$product_name', '$product_description', '$product_price')";

    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!-- HTML form for adding products -->
<form action="add_product.php" method="POST">
    <label for="product_name">Product Name:</label><br>
    <input type="text" id="product_name" name="product_name"><br>
    <label for="product_description">Product Description:</label><br>
    <textarea id="product_description" name="product_description"></textarea><br>
    <label for="product_price">Product Price:</label><br>
    <input type="number" id="product_price" name="product_price"><br>
    <input type="submit" value="Add Product">
</form>
