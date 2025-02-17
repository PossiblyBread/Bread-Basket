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
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#new">New</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#completed">Completed</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#trash">Trash</a></li>
                </ul>
                <div class="tab-content mt-3" id="messageTable"></div>
            </div>

            <!-- Desktop Reply Form -->
            <div class="desktop-message col-md-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">Send a Message</div>
                    <div class="card-body">
                        <form id="sendMailForm" method="POST">
                            <div class="mb-3">
                                <label class="form-label">To:</label>
                                <input type="email" class="form-control" id="replyToEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject:</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message:</label>
                                <textarea class="form-control" name="message" rows="4" required></textarea>
                            </div>
                            <input type="hidden" id="replyToId" name="reply_id">
                            <button type="submit" class="btn btn-success w-100">Send</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile Reply Form (Offcanvas) -->
            <div class="mobile-message col-md-5">
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasReply" data-bs-scroll="true">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">Send a Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form id="sendMailFormMobile" method="POST">
                            <div class="mb-3">
                                <label class="form-label">To:</label>
                                <input type="email" class="form-control" id="replyToEmailMobile" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject:</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message:</label>
                                <textarea class="form-control" name="message" rows="4" required></textarea>
                            </div>
                            <input type="hidden" id="replyToIdMobile" name="reply_id">
                            <button type="submit" class="btn btn-success w-100">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/mailbox.js"></script>
</body>
</html>
