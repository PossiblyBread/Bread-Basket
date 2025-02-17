<?php
// fetch_view_order.php

header('Content-Type: application/json; charset=utf-8');
include('../db_conn.php'); // This should create a MySQLi connection in $conn

// Check for the order_id parameter
if (!isset($_GET['order_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing order id.']);
    exit();
}

$order_id = intval($_GET['order_id']);

// Fetch order details from orders_tb
$stmt = $conn->prepare("SELECT order_name, order_date, order_amount FROM orders_tb WHERE order_id = ?");
if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
    exit();
}
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

if (!$order) {
    echo json_encode(['status' => 'error', 'message' => 'Order not found.']);
    exit();
}

// Fetch items for the order by joining transaction_tb with products_tb
$stmt = $conn->prepare("SELECT t.qty, p.product_name, p.product_price 
                        FROM transaction_tb t 
                        JOIN products_tb p ON t.product_id = p.product_id 
                        WHERE t.order_id = ?");
if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => $conn->error]);
    exit();
}
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

$items = [];
while ($item = $result->fetch_assoc()) {
    $price = floatval($item['product_price']);
    $item['product_price'] = $price;
    $item['sub_total'] = $price * $item['qty'];
    $items[] = $item;
}
$stmt->close();

// Return JSON response
echo json_encode([
    'status' => 'success',
    'order'  => $order,
    'items'  => $items
]);
