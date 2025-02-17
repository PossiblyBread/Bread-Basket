$(document).ready(function() {
    fetchIngredients();

    // Search functionality
    $("#searchIngredient").on("keyup", function() {
        let searchValue = $(this).val().toLowerCase();
        $(".ingredient-row").each(function() {
            let text = $(this).text().toLowerCase();
            $(this).toggle(text.includes(searchValue));
        });
    });

    // Status Filter
    $(".status-filter").on("change", function() {
        let selectedFilters = $(".status-filter:checked").map(function() {
            return this.value;
        }).get();

        $(".ingredient-row").each(function() {
            let status = $(this).data("status");
            $(this).toggle(selectedFilters.length === 0 || selectedFilters.includes(status));
        });
    });
});

// Fetch Ingredients
function fetchIngredients() {
    $.ajax({
        url: "../Manage/Ingredients/fetch_ingredients.php",
        type: "GET",
        success: function(data) {
            $("#ingredientTable").html(data);
        },
        error: function() {
            Swal.fire("Error", "Failed to fetch ingredients.", "error");
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

// Add Ingredient with Confirmation
function addIngredient() {
    let name = $("#addItemName").val().trim();
    let totalStocks = $("#addStocks").val().trim();
    
    if (name === "" || totalStocks === "") {
        Swal.fire("Warning", "Please fill all the fields.", "warning");
        return;
    }

    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to add this ingredient?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No, cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../Manage/Ingredients/add_ingredient.php",
                type: "POST",
                data: { name, stocks: totalStocks },
                success: function(response) {
                    try {
                        let res = JSON.parse(response);
                        if (res.status === "success") {
                            fetchIngredients();
                            closeModal("addIngredientModal");
                            $("#addItemName, #addStocks").val("");
                            Swal.fire("Success", "Ingredient added successfully!", "success");
                        } else {
                            Swal.fire("Error", res.message, "error");
                        }
                    } catch (error) {
                        console.error("Error parsing JSON:", error, response);
                        Swal.fire("Error", "Unexpected server response.", "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Failed to add ingredient.", "error");
                }
            });
        }
    });
}

// Open Edit Ingredient Modal
function editIngredient(id, name, totalStocks, remainingStocks) {
    $("#editIngredientId").val(id);
    $("#editIngredientName").val(name);
    $("#editIngredientStocks").val(totalStocks);
    $("#editIngredientRemainingStocks").val(remainingStocks);

    let editModal = new bootstrap.Modal(document.getElementById('editIngredientModal'));
    editModal.show();
}

function updateIngredient() {
    let id = $("#editIngredientId").val();
    let name = $("#editIngredientName").val().trim();
    let totalStocks = $("#editIngredientStocks").val().trim();
    let remainingStocks = $("#editIngredientRemainingStocks").val().trim();

    if (name === "" || totalStocks === "" || remainingStocks === "") {
        Swal.fire("Warning", "Please fill in all fields.", "warning");
        return;
    }

    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to update this ingredient?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../Manage/Ingredients/update_ingredient.php",
                type: "POST",
                data: { id, name, stocks: totalStocks, remaining: remainingStocks },
                success: function(response) {
                    try {
                        let res = JSON.parse(response);
                        if (res.status === "success") {
                            closeModal("editIngredientModal");
                            fetchIngredients();
                            Swal.fire("Success", "Ingredient updated successfully!", "success");
                        } else {
                            Swal.fire("Error", res.message, "error");
                        }
                    } catch (error) {
                        Swal.fire("Error", "Unexpected response from server.", "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Failed to update ingredient.", "error");
                }
            });
        }
    });
}


// Delete Ingredient with Confirmation
function deleteIngredient(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This ingredient will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../Manage/Ingredients/delete_ingredient.php",
                type: "POST",
                data: { id },
                success: function(response) {
                    try {
                        let res = JSON.parse(response);
                        if (res.status === "success") {
                            fetchIngredients();
                            Swal.fire("Deleted!", "Ingredient has been deleted.", "success");
                        } else {
                            Swal.fire("Error", res.message, "error");
                        }
                    } catch (error) {
                        Swal.fire("Error", "Unexpected response from server.", "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Failed to delete ingredient.", "error");
                }
            });
        }
    });
}
