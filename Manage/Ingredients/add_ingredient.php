<?php
include('../db_conn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $stocks = $_POST['stocks'];
    if (!empty($name) && !empty($stocks)) {
        $sql = "INSERT INTO ingredients_tb (ingredient_name, ingredient_stocks, ingredient_remaining_stocks, ingredient_status) 
                VALUES ('$name', '$stocks', '$stocks', 'In Stock')";
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
