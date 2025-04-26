<?php
$product_id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id = $product_id");
$product = $result->fetch_assoc();
?>

<form method="POST" action="update_product.php?id=<?php echo $product['id']; ?>">
    <label for="name">Product Name</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required>

    <label for="description">Description</label>
    <textarea name="description"><?php echo $product['description']; ?></textarea>

    <label for="price">Price</label>
    <input type="number" name="price" value="<?php echo $product['price']; ?>" required>

    <button type="submit">Update Product</button>
</form>
