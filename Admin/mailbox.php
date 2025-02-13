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
    <script>
    $(document).ready(function () {
        let latestMessageId = 0; 
        function checkForNewMessages() {
            $.ajax({
                url: "../Manage/Mail/check-new-messages.php",
                type: "GET",
                dataType: "json",
                success: function (response) {
                    if (response.newMessageId > latestMessageId) {
                        latestMessageId = response.newMessageId;
                        loadMessages(); 
                    }
                    checkForNewMessages(); 
                },
                error: function () {
                    console.error("Failed to check for new messages.");
                    setTimeout(checkForNewMessages, 5000); 
                }
            });
        }

        function loadMessages() {
            $.ajax({
                url: "../Manage/Mail/display-mail.php",
                type: "GET",
                success: function (response) {
                    $("#messageTable").html(response);
                    let newId = $("#messageTable").find("tr:first").data("id");
                    if (newId) latestMessageId = newId;
                },
                error: function () {
                    Swal.fire({ icon: "error", title: "Oops...", text: "Failed to load messages!" });
                }
            });
        }

        loadMessages(); 
        checkForNewMessages(); 

        $("#sendMailForm, #sendMailFormMobile").submit(function (e) {
            e.preventDefault();
            let formData = $(this).serialize();

            Swal.fire({ title: "Sending...", text: "Please wait...", allowOutsideClick: false, didOpen: () => Swal.showLoading() });

            $.ajax({
                url: "../Manage/Mail/send-mail.php",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        Swal.fire({ icon: "success", title: "Message Sent!", text: "Your email has been sent." })
                            .then(() => { $("#sendMailForm, #sendMailFormMobile")[0].reset(); loadMessages(); });
                    } else {
                        Swal.fire({ icon: "error", title: "Oops...", text: response.message || "Something went wrong!" });
                    }
                },
                error: function () {
                    Swal.fire({ icon: "error", title: "Oops...", text: "Error sending message. Try again." });
                }
            });
        });
        
        window.autofillReplyForm = function (email, id) {
            $("#replyToEmail, #replyToEmailMobile").val(email);
            $("#replyToId, #replyToIdMobile").val(id);
            if (window.innerWidth >= 769) {
                let offset = 150;
                let position = document.querySelector(".desktop-message").getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top: position, behavior: "smooth" });
            }
        };

        // Update status (Complete & Delete)
        $(document).on("click", ".update-status", function () {
            let id = $(this).data("id"), status = $(this).data("status"), actionText = status === "completed" ? "Complete" : "Delete";

            Swal.fire({ title: `Are you sure?`, text: `This will mark the message as ${status}.`, icon: "warning", showCancelButton: true, confirmButtonText: `Yes, ${actionText} it!` })
            .then((result) => {
                if (result.isConfirmed) {
                    $.post("../Manage/Mail/update-status.php", { id, status }, function (response) {
                        Swal.fire({ icon: response.status === "success" ? "success" : "error", title: response.status === "success" ? "Updated!" : "Error", text: response.message || "Something went wrong!" })
                        .then(() => loadMessages());
                    }, "json");
                }
            });
        });

        // Delete Forever
        $(document).on("click", ".delete-forever", function () {
            let messageId = $(this).data("id");

            Swal.fire({ title: "Are you sure?", text: "This message will be deleted permanently!", icon: "warning", showCancelButton: true, confirmButtonColor: "#d33", cancelButtonColor: "#3085d6", confirmButtonText: "Yes, delete it!" })
            .then((result) => {
                if (result.isConfirmed) {
                    $.post("../Manage/Mail/delete-forever.php", { id: messageId }, function () {
                        Swal.fire("Deleted!", "The message has been deleted forever.", "success").then(() => loadMessages());
                    });
                }
            });
        });
    });
    </script>
</body>
</html>
