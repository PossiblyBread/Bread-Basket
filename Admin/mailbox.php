<?php
    include('../Manage/Mail/display-mail.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/admin-style.css">
    <title>Bread & Basket - Mailbox</title>
</head>
<body>
    <?php include('navbar.php'); ?>  
    <main class="mailbox container">
        <h2 class="mb-4">Mailbox</h2>
        <div class="row">
            <div class="col-md-7">
                <ul class="nav nav-tabs" id="mailTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#new">New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#trash">Trash</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="new">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="hide-on-small">Email</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($newMessages as $message): ?>
                                    <tr class="message-row" data-bs-toggle="collapse" data-bs-target="#msg<?= $message['inq_id'] ?>">
                                        <td><?= $message['inq_fullname'] ?></td>
                                        <td class="hide-on-small"><?= $message['inq_email'] ?></td>
                                        <td><?= date('m/d/Y - h:iA', strtotime($message['date_time'])) ?></td>
                                    </tr>
                                    <tr class="message-content">
                                        <td colspan="3">
                                            <div id="msg<?= $message['inq_id'] ?>" class="collapse">
                                                <div class="message-container">
                                                    <div class="row">
                                                        <div class="col-3 fw-bold text-end">Message</div>
                                                        <div class="col-9" style="white-space: pre-line;"><?= $message['inq_message'] ?></div>
                                                    </div><hr>
                                                    <div class="center-in-mobile">
                                                        <div class="row">
                                                            <div class="col-3 fw-bold text-end">Phone Num</div>
                                                            <div class="col-9"><?= $message['inq_phone_num'] ?></div>
                                                        </div><hr>
                                                        <div class="row email-on-small">
                                                            <div class="col-3 fw-bold text-end">Email</div>
                                                            <div class="col-9"><?= $message['inq_email'] ?></div>
                                                        </div><hr class="hr-on-email">
                                                        <div class="row">
                                                            <div class="col-3 fw-bold text-end">Address</div>
                                                            <div class="col-9"><?= $message['inq_address'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-2 action-buttons">
                                                    <button class="btn btn-sm btn-success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasReply" onclick="autofillReplyForm('<?= $message['inq_email'] ?>', '<?= $message['inq_id'] ?>')">Reply</button>
                                                    <button class="btn btn-sm btn-secondary">Complete</button>
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </div><br>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Desktop View -->
            <div class="desktop-message col-md-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Send a Message
                    </div>
                    <div class="card-body">
                        <form action="../Manage/Mail/send-mail.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">To:</label>
                                <input type="email" class="form-control" id="replyToEmail" name="email" placeholder="Recipient Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject:</label>
                                <input type="text" class="form-control" name="subject" placeholder="Enter Subject" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message:</label>
                                <textarea class="form-control" name="message" rows="4" placeholder="Write your message here..." required></textarea>
                            </div>
                            <input type="hidden" id="replyToId" name="reply_id">
                            <button type="submit" class="btn btn-success w-100">Send</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Mobile View (Offcanvas) -->
            <div class="mobile-message col-md-5">
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasReply">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">Send a Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form action="../Manage/Mail/send-mail.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">To:</label>
                                <input type="email" class="form-control" id="replyToEmailMobile" name="email" placeholder="Recipient Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject:</label>
                                <input type="text" class="form-control" name="subject" placeholder="Enter Subject" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message:</label>
                                <textarea class="form-control" name="message" rows="4" placeholder="Write your message here..." required></textarea>
                            </div>
                            <input type="hidden" id="replyToIdMobile" name="reply_id">
                            <button type="submit" class="btn btn-success w-100">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        function autofillReplyForm(email, id) {
            document.getElementById('replyToEmail').value = email;
            document.getElementById('replyToId').value = id;

            document.getElementById('replyToEmailMobile').value = email;
            document.getElementById('replyToIdMobile').value = id;

            let replyForm = document.querySelector('.desktop-message');
            if (window.innerWidth >= 769 && replyForm) {
                let offset = 150; 
                let position = replyForm.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top: position, behavior: 'smooth' });
            }
        }
    </script>
</body>
</html>
<style>
/* Admin Mailbox */
.mailbox {
    padding-right: 220px;   
}
.message-row {
    cursor: pointer;
}
.message-row:hover {
    background-color: #f5f5f5; 
}
.message-content td {
    padding: 0 15px 0 15px;
}
.message-container{
    padding: 10px;
}
.mobile-message {
    display: none;
}
.email-on-small {
    display: none;
}
.hr-on-email {
    display: none;
}
@media (max-width: 992px) {
    .mailbox{
        padding-right: 0;
    }        
}
@media (max-width: 769px) {
    .desktop-message {
        display: none;
    }
    .mobile-message {
        display: block;
    }
    .action-buttons {
        text-align: right !important;
    }
}
@media (max-width: 576px) {
    .mailbox {
        width: 90%;
    }
    .hide-on-small {
        display: none;
    }
    .email-on-small {
        display: flex;
    }
    .hr-on-email {
        display: flex;
    }
    thead th {
        text-align: center; 
        padding: 10px; 
    }
    .message-row td {
        text-align: center; 
        padding: 10px;
    }
    .message-container .row{
        flex-direction: column; 
        align-items: center;
    }
    .center-in-mobile{
        text-align: center !important;
    }
    .center-in-mobile .col-3{
        text-align: center !important;
    }
    .action-buttons {
        text-align: center !important;
    }
}
</style>
