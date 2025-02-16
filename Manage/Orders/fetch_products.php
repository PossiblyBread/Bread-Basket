<?php
include('../db_conn.php');

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Query to select only the required columns
$sql = "SELECT * FROM products_tb";
$result = $conn->query($sql);

$products = [];
if ($result && $result->num_rows > 0) {
    // Fetch each product and add it to the $products array
    while($row = $result->fetch_assoc()){
         $products[] = $row;
    }
}

// Return the products as JSON
echo json_encode($products);

// Close connection
$conn->close();
?>
