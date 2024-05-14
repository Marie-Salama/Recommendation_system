<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Datastore";

// Create a new PDO instance for database connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit;
}

// SQL query to retrieve specific data from the database
$sql = "SELECT * FROM `products`" ;
# WHERE condition"

try {
    // Execute the query
    $stmt = $conn->query($sql);

    // Fetch the data into an associative array
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Close the database connection
    $conn = null;
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    exit;
}

// Define the CSV file path and name
$csvFile = 'data12.csv';

// Open the CSV file in write mode
$file = fopen($csvFile, 'w');

// Write headers to the CSV file
$headers = array('product_id', 'product_title', 'product_description', 'category_id', 'product_price', 'product_image');
fputcsv($file, $headers);

// Write data rows to the CSV file
foreach ($data as $row) {
    fputcsv($file, $row);
}

// Close the CSV file
fclose($file);

echo "Data has been exported to $csvFile";
