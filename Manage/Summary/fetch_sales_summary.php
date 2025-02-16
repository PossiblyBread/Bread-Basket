<?php
include('../db_conn.php');

// Enable error reporting for debugging (Remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get parameters
$year = isset($_GET['year']) && is_numeric($_GET['year']) ? intval($_GET['year']) : null;
$month = isset($_GET['month']) && $_GET['month'] !== "All" ? intval($_GET['month']) : null;

// Start SQL query
$sql = "SELECT 
            YEAR(o.order_date) AS order_year, 
            MONTH(o.order_date) AS order_month, 
            DAY(o.order_date) AS order_day,
            COUNT(DISTINCT o.order_id) AS total_orders, 
            SUM(t.qty) AS total_quantities, 
            SUM(t.qty * p.product_price) AS total_amount
        FROM orders_tb o
        JOIN transaction_tb t ON o.order_id = t.order_id
        JOIN products_tb p ON t.product_id = p.product_id
        WHERE 1=1";

// Apply filters dynamically
$params = [];
$types = "";

// Filter by year (if not "All Years")
if ($year) {
    $sql .= " AND YEAR(o.order_date) = ?";
    $params[] = $year;
    $types .= "i";
}

// Filter by month (if not "All Months")
if ($month) {
    $sql .= " AND MONTH(o.order_date) = ?";
    $params[] = $month;
    $types .= "i";
}

// Group and order results
$sql .= " GROUP BY order_year, order_month, order_day ORDER BY order_year DESC, order_month DESC, order_day ASC";

// Prepare and execute statement
$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Output JSON response
echo json_encode($data);

// Close connections
$stmt->close();
$conn->close();
?>
