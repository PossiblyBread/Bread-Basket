<?php
include('../db_conn.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit;
}

$id = isset($_POST['id']) ? filter_var($_POST['id'], FILTER_VALIDATE_INT) : 0;

if (!$id) {
    echo json_encode(["status" => "error", "message" => "Invalid product ID."]);
    exit;
}

$conn->begin_transaction();

try {
    // Check if the product exists
    $stmt = $conn->prepare("SELECT product_id FROM products_tb WHERE product_id = ?");
    if (!$stmt) {
        throw new Exception("Database error: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 0) {
        throw new Exception("Product not found.");
    }

    // Update product_archive to 'off' instead of deleting
    $stmt = $conn->prepare("UPDATE products_tb SET product_archive = 'off' WHERE product_id = ?");
    if (!$stmt) {
        throw new Exception("Database error: " . $conn->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    $conn->commit();
    echo json_encode(["status" => "success", "message" => "Product archived successfully."]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}

$conn->close();
?>