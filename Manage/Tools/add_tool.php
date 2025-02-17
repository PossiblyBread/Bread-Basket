<?php
include('../db_conn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

    if (!empty($name) && !empty($size) && !empty($quantity) && !empty($category)) {
        $sql = "INSERT INTO tools_tb (tool_name, tool_size, tool_quantity, tool_category) 
                VALUES ('$name', '$size', '$quantity', '$category')";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $conn->error]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
    }
}
?>