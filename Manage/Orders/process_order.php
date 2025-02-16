<?php
// process_order.php

include('../db_conn.php'); // Ensure this file sets up the $conn MySQLi connection
header('Content-Type: application/json');

// Retrieve and decode the JSON input from the AJAX call
$data = json_decode(file_get_contents('php://input'), true);

// Validate JSON input and required fields
if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON input.']);
    exit;
}

if (!isset($data['customerName'], $data['totalAmount'], $data['items'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields.']);
    exit;
}

$customerName = $data['customerName'];
$totalAmount  = $data['totalAmount'];
$items        = $data['items'];

// Begin a new database transaction
$conn->begin_transaction();

try {
    // 1. Insert the new order into orders_tb table.
    $orderQuery = "INSERT INTO orders_tb (order_name, order_amount) VALUES (?, ?)";
    $stmtOrder  = $conn->prepare($orderQuery);
    if (!$stmtOrder) {
        throw new Exception("Order statement prepare failed: " . $conn->error);
    }
    // Bind parameters: "si" = string for order_name, integer for order_amount
    $stmtOrder->bind_param("si", $customerName, $totalAmount);
    if (!$stmtOrder->execute()) {
        throw new Exception("Order statement execution failed: " . $stmtOrder->error);
    }
    // Get the generated order_id for linking transactions
    $order_id = $stmtOrder->insert_id;
    $stmtOrder->close();

    // 2. Prepare statements for inserting transactions and updating product stocks.
    $transQuery = "INSERT INTO transaction_tb (order_id, product_id, qty, amount) VALUES (?, ?, ?, ?)";
    $stmtTrans  = $conn->prepare($transQuery);
    if (!$stmtTrans) {
        throw new Exception("Transaction statement prepare failed: " . $conn->error);
    }

    $updateStockQuery = "UPDATE products_tb SET product_remaining_stocks = product_remaining_stocks - ? WHERE product_id = ?";
    $stmtUpdateStock  = $conn->prepare($updateStockQuery);
    if (!$stmtUpdateStock) {
        throw new Exception("Update stock statement prepare failed: " . $conn->error);
    }

    // 3. Process each ordered item.
    foreach ($items as $item) {
        if (!isset($item['product_id'], $item['qty'])) {
            throw new Exception("Invalid item data.");
        }

        $product_id = $item['product_id'];
        $qty        = $item['qty'];

        // Retrieve product price
        $priceQuery = "SELECT product_price FROM products_tb WHERE product_id = ?";
        $stmtPrice  = $conn->prepare($priceQuery);
        if (!$stmtPrice) {
            throw new Exception("Price statement prepare failed: " . $conn->error);
        }

        $stmtPrice->bind_param("i", $product_id);
        $stmtPrice->execute();
        $stmtPrice->bind_result($product_price);
        if (!$stmtPrice->fetch()) {
            throw new Exception("Failed to fetch product price.");
        }
        $stmtPrice->close();

        // Calculate amount
        $amount = $product_price * $qty;

        // Insert item into transaction_tb
        $stmtTrans->bind_param("iiii", $order_id, $product_id, $qty, $amount);
        if (!$stmtTrans->execute()) {
            throw new Exception("Transaction insertion failed: " . $stmtTrans->error);
        }

        // Update product_remaining_stocks in products_tb
        $stmtUpdateStock->bind_param("ii", $qty, $product_id);
        if (!$stmtUpdateStock->execute()) {
            throw new Exception("Stock update failed: " . $stmtUpdateStock->error);
        }
    }

    // Close the prepared statements
    $stmtTrans->close();
    $stmtUpdateStock->close();

    // 4. Commit the transaction if all operations were successful.
    $conn->commit();

    echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.']);
} catch (Exception $e) {
    // Roll back all changes if any error occurs
    $conn->rollback();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

// Close the database connection
$conn->close();
?>
