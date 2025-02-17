<?php
require '../db_conn.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
    exit();
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$status = $_POST['status'];

if ($id <= 0 || !in_array($status, ['completed', 'trash'])) {
    echo json_encode(["status" => "error", "message" => "Invalid input."]);
    exit();
}

$sql = "UPDATE inquiry_tb SET inq_status = ? WHERE inq_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $status, $id);

if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Database update failed."]);
}
?>
