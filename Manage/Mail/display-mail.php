<?php
include('../manage/db_conn.php');
$newMessages = [];
$completedMessages = [];
$trashMessages = [];

$query = "SELECT * FROM inquiry_tb ORDER BY date_time DESC";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $row['inq_message'] = nl2br(htmlspecialchars($row['inq_message']));
    if ($row['inq_status'] == 'new') {
        $newMessages[] = $row;
    } elseif ($row['inq_status'] == 'completed') {
        $completedMessages[] = $row;
    } elseif ($row['inq_status'] == 'trash') {
        $trashMessages[] = $row;
    }
}
?>
