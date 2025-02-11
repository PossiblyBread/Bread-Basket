<?php
include('../db_conn.php');

function getMessagesByStatus($status) {
    global $conn;
    $sql = "SELECT * FROM inquiry_tb WHERE inq_status = ? ORDER BY date_time DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

$newMessages = getMessagesByStatus('new');
$completedMessages = getMessagesByStatus('completed');
$trashMessages = getMessagesByStatus('trash');

$messageCategories = ['new' => $newMessages, 'completed' => $completedMessages, 'trash' => $trashMessages];
?>

<?php foreach ($messageCategories as $status => $messages): ?>
    <div class="tab-pane fade <?= ($status == 'new') ? 'show active' : '' ?>" id="<?= $status ?>">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th class="hide-on-small">Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($messages)): ?>
                    <tr><td colspan="3">No messages found.</td></tr>
                <?php else: foreach ($messages as $message): ?>
                    <tr class="message-row" data-bs-toggle="collapse" data-bs-target="#msg<?= $message['inq_id'] ?>">
                        <td><?= htmlspecialchars($message['inq_fullname']) ?></td>
                        <td class="hide-on-small"><?= htmlspecialchars($message['inq_email']) ?></td>
                        <td><?= date('m/d/Y - h:i A', strtotime($message['date_time'])) ?></td>
                    </tr>
                    <tr class="message-content">
                        <td colspan="3">
                            <div id="msg<?= $message['inq_id'] ?>" class="collapse">
                                <div class="message-container">
                                    <div class="row">
                                        <div class="col-3 fw-bold text-end">Message</div>
                                        <div class="col-9" style="white-space: pre-line;"><?= htmlspecialchars($message['inq_message']) ?></div>
                                    </div><hr>
                                    <div class="center-in-mobile">
                                        <div class="row">
                                            <div class="col-3 fw-bold text-end">Phone Num</div>
                                            <div class="col-9"><?= htmlspecialchars($message['inq_phone_num']) ?></div>
                                        </div><hr>
                                        <div class="row email-on-small">
                                            <div class="col-3 fw-bold text-end">Email</div>
                                            <div class="col-9"><?= htmlspecialchars($message['inq_email']) ?></div>
                                        </div><hr class="hr-on-email">
                                        <div class="row">
                                            <div class="col-3 fw-bold text-end">Address</div>
                                            <div class="col-9"><?= htmlspecialchars($message['inq_address']) ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 action-buttons">
                                <?php if ($message['inq_status'] === 'new'): ?>
                                        <button class="btn btn-sm btn-success" 
                                                data-bs-toggle="offcanvas" 
                                                data-bs-target="#offcanvasReply" 
                                                onclick="autofillReplyForm('<?= htmlspecialchars($message['inq_email']) ?>', '<?= $message['inq_id'] ?>')">
                                                Reply
                                        </button>
                                        <button class="btn btn-sm btn-secondary update-status" 
                                                data-id="<?= $message['inq_id'] ?>" 
                                                data-status="completed">
                                                Complete
                                        </button>
                                        <button class="btn btn-sm btn-danger update-status" 
                                                data-id="<?= $message['inq_id'] ?>" 
                                                data-status="trash">
                                                Delete
                                        </button>
                                    <?php elseif ($message['inq_status'] === 'trash'): ?>
                                        <button class="btn btn-sm btn-success" 
                                                data-bs-toggle="offcanvas" 
                                                data-bs-target="#offcanvasReply" 
                                                onclick="autofillReplyForm('<?= htmlspecialchars($message['inq_email']) ?>', '<?= $message['inq_id'] ?>')">
                                                Reply
                                        </button>
                                        <button class="btn btn-sm btn-danger delete-forever" 
                                                data-id="<?= $message['inq_id'] ?>">
                                                Delete Forever
                                        </button>
                                    
                                <?php endif; ?>
                                </div>
                                <br>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php endforeach; ?>
