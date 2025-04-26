<?php
// Include the database connection
include('db.php');

// SQL query to get product votes
$sql = "SELECT p.name, COUNT(v.id) AS votes_count 
        FROM votes v
        JOIN products p ON v.product_id = p.id 
        GROUP BY p.name 
        ORDER BY votes_count DESC";

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Votes Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>

<h2>Product Votes Report</h2>

<!-- Table to display the votes -->
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Votes Count</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch and display the data
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['name'] . "</td><td>" . $row['votes_count'] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No data available</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
