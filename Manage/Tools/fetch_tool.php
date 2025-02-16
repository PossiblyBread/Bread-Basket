<?php
include('../db_conn.php');
$sql = "SELECT * FROM tools_tb";
$result = $conn->query($sql);
$rows = "";
while ($row = $result->fetch_assoc()) {
    $rows .= '<tr class="tool-row">
                <td>' . $row['tool_name'] . '</td>
                <td>' . $row['tool_size'] . '</td>
                <td>' . $row['tool_quantity'] . '</td>
                <td>' . $row['tool_category'] . '</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editTool(' . $row['tool_id'] . ', \'' . $row['tool_name'] . '\', \'' . $row['tool_size'] . '\', ' . $row['tool_quantity'] . ', \'' . $row['tool_category'] . '\')">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteTool(' . $row['tool_id'] . ')">Delete</button>
                </td>
              </tr>';
}
echo $rows;
$conn->close();
?>