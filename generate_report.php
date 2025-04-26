$sql = "SELECT product_id, COUNT(*) AS votes_count FROM votes GROUP BY product_id ORDER BY votes_count DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "Product ID: " . $row['product_id'] . " | Votes: " . $row['votes_count'] . "<br>";
}
