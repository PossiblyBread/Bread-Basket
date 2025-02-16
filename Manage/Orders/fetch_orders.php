<?php
// fetch_orders.php

include('../db_conn.php');

// SQL query to fetch orders (based on your orders_tb structure)
$sql = "SELECT * FROM orders_tb ORDER BY order_date DESC";
$result = $conn->query($sql);
$rows = "";

// Loop through each order and build a table row
while ($row = $result->fetch_assoc()) {
    $escapedName = addslashes($row['order_name']); // Escape order name if needed
    $orderDate   = $row['order_date'];             // Order date (assumed properly formatted)
    $orderAmount = '₱' . number_format((float)$row['order_amount'], 2);
    $rows .= '<tr class="order-row">
                <td>#' . $row['order_id'] . '</td>
                <td>' . htmlspecialchars($escapedName) . '</td>
                <td>' . $orderDate . '</td>
                <td>' . $orderAmount . '</td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="viewOrder(' . $row['order_id'] . ')">View</button>
                </td>
              </tr>';
}

echo $rows;

// Close the database connection
$conn->close();
?>
