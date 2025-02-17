<?php
include('../db_conn.php');

header("Content-Type: application/json");

$sql = "
    SELECT p.product_id, p.product_image, p.product_name, p.product_description, COALESCE(SUM(t.qty), 0) AS total_sales
    FROM transaction_tb t
    INNER JOIN products_tb p ON t.product_id = p.product_id
    WHERE p.product_archive = 'on'
    GROUP BY p.product_id, p.product_image, p.product_name, p.product_description
    ORDER BY total_sales DESC
    LIMIT 3;
";

$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    exit();
}

$topProducts = [];
while ($row = $result->fetch_assoc()) {
    $topProducts[] = $row;
}

echo json_encode(["status" => "success", "data" => $topProducts]);
$conn->close();
?>
