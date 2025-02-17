$(document).ready(function() {
    fetchTools();

    // Search functionality
    $("#searchTools").on("keyup", function() {
        let searchValue = $(this).val().toLowerCase();
        $(".tool-row").each(function() {
            let text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(searchValue));
        });
    });

    // Add Tool Form Submission
    $("#addToolForm").on("submit", function(e) {
        e.preventDefault();
        confirmAddTool();
    });

    // Edit Tool Form Submission
    $("#editToolForm").on("submit", function(e) {
        e.preventDefault();
        confirmUpdateTool();
    });
});

function fetchTools() {
    $.ajax({
        url: "../Manage/Tools/fetch_tool.php",
        type: "GET",
        success: function(data) {
            $("#toolsTableBody").html(data);
        },
        error: function() {
            Swal.fire("Error", "Failed to fetch tools.", "error");
        }
    });
}

// Close Modal Properly
function closeModal(modalId) {
    let modalElement = document.getElementById(modalId);
    if (modalElement) {
        let modalInstance = bootstrap.Modal.getInstance(modalElement);
        if (modalInstance) modalInstance.hide();
    }
    $(".modal-backdrop").remove();
    $("body").removeClass("modal-open");
}

// Confirm before adding a tool
function confirmAddTool() {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to add this tool?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            addTool();
        }
    });
}

function addTool() {
    let formData = $("#addToolForm").serialize();
    $.ajax({
        url: "../Manage/Tools/add_tool.php",
        type: "POST",
        data: formData,
        success: function(response) {
            let res = JSON.parse(response);
            if (res.status === "success") {
                fetchTools();
                closeModal("addToolModal");
                Swal.fire("Success", "Tool added successfully!", "success");
            } else {
                Swal.fire("Error", res.message, "error");
            }
        },
        error: function() {
            Swal.fire("Error", "Failed to add tool.", "error");
        }
    });
}

// Confirm before updating a tool
function confirmUpdateTool() {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to update this tool?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            updateTool();
        }
    });
}

function updateTool() {
    let formData = $("#editToolForm").serialize();
    $.ajax({
        url: "../Manage/Tools/update_tool.php",
        type: "POST",
        data: formData,
        success: function(response) {
            let res = JSON.parse(response);
            if (res.status === "success") {
                fetchTools();
                closeModal("editToolModal");
                Swal.fire("Success", "Tool updated successfully!", "success");
            } else {
                Swal.fire("Error", res.message, "error");
            }
        },
        error: function() {
            Swal.fire("Error", "Failed to update tool.", "error");
        }
    });
}

function editTool(id, name, size, quantity, category) {
    $("#editToolId").val(id);
    $("#editToolName").val(name);
    $("#editToolSize").val(size);
    $("#editToolQuantity").val(quantity);
    $("#editToolCategory").val(category);
    $("#editToolModal").modal("show");
}

// Confirm before deleting a tool
function deleteTool(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This tool will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../Manage/Tools/delete_tool.php",
                type: "POST",
                data: { id },
                success: function(response) {
                    let res = JSON.parse(response);
                    if (res.status === "success") {
                        fetchTools();
                        Swal.fire("Deleted!", "Tool has been deleted.", "success");
                    } else {
                        Swal.fire("Error", res.message, "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Failed to delete tool.", "error");
                }
            });
        }
    });
}