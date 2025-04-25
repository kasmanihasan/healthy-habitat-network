<?php
include('db.php'); // Include the database connection

$sql = "SELECT * FROM products";  // SQL query to fetch all products
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each product
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h3>" . $row["product_name"] . "</h3>";
        echo "<p>" . $row["product_description"] . "</p>";
        echo "<p>Price: " . $row["product_price"] . "</p>";
        echo "<form action='vote.php' method='POST'>";
        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
        echo "<button type='submit'>Vote for this product</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

$conn->close();
?>
