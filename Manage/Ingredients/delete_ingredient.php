<?php
include('../db_conn.php');
$id = $_POST['id'];

$sql = "DELETE FROM ingredients_tb WHERE ingredient_id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
}
?>