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