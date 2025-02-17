<?php
include('../db_conn.php');

$query = "SELECT * FROM products_tb WHERE product_archive = 'on'";
$result = mysqli_query($conn, $query);

$products = array();

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

echo json_encode($products);
?>
