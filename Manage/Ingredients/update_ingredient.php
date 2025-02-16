<?php
include('../db_conn.php');
$id = $_POST['id'];
$name = $_POST['name'];
$stocks = $_POST['stocks'];
$remaining = $_POST['remaining'];
$remaining_percentage = ($remaining / $stocks) * 100;
if ($remaining_percentage >= 85) {
    $status = 'In Stock';
} elseif ($remaining_percentage >= 50) {
    $status = 'Moderate'; 
} elseif ($remaining_percentage >= 25) {
    $status = 'Low Stock';
} else {
    $status = 'Critical';
}

$sql = "UPDATE ingredients_tb SET 
            ingredient_name = '$name', 
            ingredient_stocks = '$stocks', 
            ingredient_remaining_stocks = '$remaining', 
            ingredient_status = '$status'
        WHERE ingredient_id = $id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
}
?>
