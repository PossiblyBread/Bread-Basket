<?php
include('../db_conn.php');

// SQL queries to count the ingredients based on their status
$sqlInStock = "SELECT COUNT(*) AS count FROM ingredients_tb WHERE ingredient_status = 'In Stock'";
$sqlModerate = "SELECT COUNT(*) AS count FROM ingredients_tb WHERE ingredient_status = 'Moderate'";
$sqlLowStock = "SELECT COUNT(*) AS count FROM ingredients_tb WHERE ingredient_status = 'Low Stock'";
$sqlCritical = "SELECT COUNT(*) AS count FROM ingredients_tb WHERE ingredient_status = 'Critical'";

// Execute queries
$resultInStock = $conn->query($sqlInStock);
$resultModerate = $conn->query($sqlModerate);
$resultLowStock = $conn->query($sqlLowStock);
$resultCritical = $conn->query($sqlCritical);

// Fetch the results
$inStockCount = $resultInStock->fetch_assoc()['count'];
$moderateCount = $resultModerate->fetch_assoc()['count'];
$lowStockCount = $resultLowStock->fetch_assoc()['count'];
$criticalCount = $resultCritical->fetch_assoc()['count'];

// Return the counts as a JSON object
echo json_encode([
    "inStock" => $inStockCount,
    "moderate" => $moderateCount,
    "lowStock" => $lowStockCount,
    "critical" => $criticalCount
]);

// Close the connection
$conn->close();
?>

