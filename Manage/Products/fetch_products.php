<?php
include('../db_conn.php');

$sql = "SELECT * FROM products_tb WHERE product_archive = 'on'";
$result = $conn->query($sql);
$rows = "";

while ($row = $result->fetch_assoc()) {
    $escapedName = addslashes($row['product_name']);
    $escapedDescription = addslashes($row['product_description']);
    $formattedPrice = '₱' . number_format((float) $row['product_price'], 2);
    $imagePath = '../Manage/' . $row['product_image'];

    $rows .= '<tr class="product-row" data-status="' . htmlspecialchars($row['product_status']) . '">
                <td><img src="' . htmlspecialchars($imagePath) . '" alt="Product Image" width="50"></td>
                <td>' . htmlspecialchars($row['product_name']) . '</td>
                <td>' . htmlspecialchars($row['product_stocks']) . '</td>
                <td>' . htmlspecialchars($row['product_remaining_stocks']) . '</td>
                <td>' . $formattedPrice . '</td> 
                <td>' . htmlspecialchars($row['product_status']) . '</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editProduct(
                        ' . (int)$row['product_id'] . ',
                        \'' . $escapedName . '\',
                        ' . (int)$row['product_stocks'] . ',
                        ' . (int)$row['product_remaining_stocks'] . ',
                        \'' . addslashes($formattedPrice) . '\',
                        \'' . $escapedDescription . '\',
                        \'' . addslashes($imagePath) . '\'
                    )">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteProduct(' . (int)$row['product_id'] . ')">Delete</button>
                </td>
              </tr>';
}

echo $rows;
$conn->close();
?>
