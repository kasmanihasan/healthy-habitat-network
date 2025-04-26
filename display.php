
<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'healthy_habitat_network');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Display products
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row['product_name'] . "</h3>";
        echo "<p>" . $row['product_description'] . "</p>";
        echo "<p>Price: £" . $row['price'] . "</p>";
        echo "</div>";
    }
} else {
    echo "No products found";
}

$conn->close();
?>
