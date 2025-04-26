<?php
// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'healthy_habitat_network';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Get the values from the form
   $resident_id = $_POST['resident_id'];  // assuming resident_id is stored in session or form
   $product_id = $_POST['product_id'];
   $vote = $_POST['vote'];

   // Insert vote into the database
   $sql = "INSERT INTO votes (resident_id, product_id, vote) VALUES ('$resident_id', '$product_id', '$vote')";

   if ($conn->query($sql) === TRUE) {
      echo "Vote recorded successfully";
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
}
?>
