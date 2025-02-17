<?php
include('../db_conn.php');

$sql = "SELECT DISTINCT YEAR(order_date) AS order_year FROM orders_tb ORDER BY order_year DESC";
$result = $conn->query($sql);

$years = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $years[] = $row['order_year'];
    }
}

echo json_encode($years);
$conn->close();
?>