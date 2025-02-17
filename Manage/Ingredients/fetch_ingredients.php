<?php
include('../db_conn.php');
$sql = "SELECT * FROM ingredients_tb";
$result = $conn->query($sql);
$rows = "";
while ($row = $result->fetch_assoc()) {
    $escapedName = addslashes($row['ingredient_name']);
    $rows .= '<tr class="ingredient-row" data-status="' . $row['ingredient_status'] . '">
                <td>' . $row['ingredient_name'] . '</td>
                <td>' . $row['ingredient_stocks'] . ' kg</td>
                <td>' . $row['ingredient_remaining_stocks'] . ' kg</td>
                <td>' . $row['ingredient_status'] . '</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editIngredientModal" 
                            onclick="editIngredient(' . $row['ingredient_id'] . ', \'' . $escapedName . '\', ' . $row['ingredient_stocks'] . ', ' . $row['ingredient_remaining_stocks'] . ')">
                        Edit
                    </button>
                    <button class="btn btn-danger btn-sm" onclick="deleteIngredient(' . $row['ingredient_id'] . ')">Delete</button>
                </td>
              </tr>';
}
echo $rows;


$conn->close();
?>
