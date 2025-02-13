<?php
include('../db_conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $messageId = $_POST['id'];
    
    $sql = "DELETE FROM inquiry_tb WHERE inq_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $messageId);
    
    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
?>
