<?php
include('../db_conn.php');
$id = $_POST['id'];

$sql = "DELETE FROM tools_tb WHERE tool_id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
}
?>