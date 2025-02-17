<?php
include('../db_conn.php');

$sql = "SELECT inq_id FROM inquiry_tb ORDER BY inq_id DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo json_encode(["newMessageId" => $row ? $row['inq_id'] : 0]);
?>
