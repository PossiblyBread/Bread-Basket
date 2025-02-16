<?php
include('../db_conn.php');
$id = $_POST['id'];
$name = $_POST['name'];
$size = $_POST['size'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];

$sql = "UPDATE tools_tb SET 
            tool_name = '$name', 
            tool_size = '$size', 
            tool_quantity = '$quantity', 
            tool_category = '$category'
        WHERE tool_id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
}
?>