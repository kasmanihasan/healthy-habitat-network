<?php
// Connect to the database
$host = 'localhost';
$username = 'root';
$password = ''; // Use your actual password here if it's not empty
$dbname = 'healthy_habitat_network';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Get the values from the form
   $product_name = $_POST['product_name'];
   $product_description = $_POST['product_description'];
   $price = $_POST['price'];
   $category = $_POST['category'];

   // SQL query to insert the data into the database
   $sql = "INSERT INTO products (product_name, product_description, price, category)
           VALUES ('$product_name', '$product_description', '$price', '$category')";

   if ($conn->query($sql) === TRUE) {
      echo "New product added successfully";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
}
?>

