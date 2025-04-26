<?php
// Include your database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'healthy_habitat_network';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data to show on the dashboard
$residents_count = $conn->query("SELECT COUNT(*) AS count FROM residents")->fetch_assoc()['count'];
$products_count = $conn->query("SELECT COUNT(*) AS count FROM products")->fetch_assoc()['count'];
$votes_count = $conn->query("SELECT COUNT(*) AS count FROM votes")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Admin Dashboard</h1>

        <div class="row">
            <!-- Resident Count -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Residents</h5>
                        <p class="card-text"><?php echo $residents_count; ?> Residents</p>
                        <a href="manage_residents.php" class="btn btn-primary">Manage Residents</a>
                    </div>
                </div>
            </div>

            <!-- Product Count -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text"><?php echo $products_count; ?> Products</p>
                        <a href="manage_products.php" class="btn btn-primary">Manage Products</a>
                    </div>
                </div>
            </div>

            <!-- Vote Count -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Votes</h5>
                        <p class="card-text"><?php echo $votes_count; ?> Votes</p>
                        <a href="view_votes.php" class="btn btn-primary">View Votes</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions Section -->
        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Areas</h5>
                        <a href="manage_areas.php" class="btn btn-info">Add/Edit Areas</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Reports</h5>
                        <a href="generate_reports.php" class="btn btn-warning">Generate Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
