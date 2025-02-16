<?php
include('../db_conn.php');


$month = date('Y-m'); // Get current year-month
$formattedMonthYear = date('F Y'); // Example: February 2025

$query = "SELECT 
            SUM(p.product_price * t.qty) AS total_sales,
            COUNT(DISTINCT o.order_id) AS total_orders
          FROM transaction_tb t
          JOIN products_tb p ON t.product_id = p.product_id
          JOIN orders_tb o ON t.order_id = o.order_id
          WHERE DATE_FORMAT(o.order_date, '%Y-%m') = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $month);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

echo json_encode([
    'total_sales' => $row['total_sales'] ?? 0,
    'total_orders' => $row['total_orders'] ?? 0,
    'month_year' => $formattedMonthYear
]); // Return JSON response
?>
