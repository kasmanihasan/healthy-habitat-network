<?php
// Include the database connection file
include('db.php');

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch the product details from the database
    $result = $conn->query("SELECT * FROM products WHERE id = $product_id");

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit;
    }
} else {
    echo "No product ID specified!";
    exit;
}
?>

<!-- HTML form to edit product -->
<form method="POST" action="update_product.php?id=<?php echo $product['id']; ?>">
    <label for="name">Product Name</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required>

    <label for="description">Description</label>
    <textarea name="description"><?php echo $product['description']; ?></textarea>

    <label for="price">Price</label>
    <input type="number" name="price" value="<?php echo $product['price']; ?>" required>

    <button type="submit">Update Product</button>
</form>
