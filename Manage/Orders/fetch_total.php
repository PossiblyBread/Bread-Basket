<?php

include('../db_conn.php');
$sql = "SELECT SUM(order_amount) AS total_amount, COUNT(order_id) AS order_count FROM orders_tb";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $total_amount = $row['total_amount'];
        $order_count = $row['order_count'];
    }
    echo json_encode(["total_amount" => $total_amount, "order_count" => $order_count]);
} else {
    echo json_encode(["total_amount" => 0, "order_count" => 0]);
}

$conn->close();
?>
