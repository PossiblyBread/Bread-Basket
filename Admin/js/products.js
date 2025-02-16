$(document).ready(function() {
    fetchProducts();

    // Search functionality
    $("#searchProducts").on("keyup", function() {
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

// Fix: Remove default.jpg reference and ensure valid image handling

document.getElementById("productImageInput").addEventListener("change", function(event) {
    let reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById("productImagePreview").src = e.target.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});



// Fix: Correct fetch function for products
function fetchProducts() {
    $.ajax({
        url: "../Manage/Products/fetch_products.php",
        type: "GET",
        success: function(data) {
            $("#productTable").html(data);
        },
        error: function() {
            Swal.fire("Error", "Failed to fetch products.", "error");
        }
    });
}

function closeModal(modalId) {
    let modalElement = document.getElementById(modalId);
    if (modalElement) {
        let modalInstance = bootstrap.Modal.getInstance(modalElement);
        if (modalInstance) modalInstance.hide();
    }
    $(".modal-backdrop").remove();
    $("body").removeClass("modal-open");
}

document.getElementById("addProductForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    Swal.fire({
        title: "Confirm Product Addition",
        text: "Are you sure you want to add this product?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../Manage/Products/add_product.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    let res = JSON.parse(response);
                    if (res.status === "success") {
                        closeModal('addProductModal');
                        document.getElementById("addProductForm").reset();
                        Swal.fire("Success", "Product added successfully!", "success");
                        fetchProducts();
                    } else {
                        Swal.fire("Error", res.message, "error");
                    }
                },
                error: function() {
                    Swal.fire("Error", "Failed to add product.", "error");
                }
            });
        }
    });
});

function editProduct(id, name, stocks, remainingStocks, price, description, imagePath) {
    $("#editProductId").val(id);
    $("#editProductName").val(name);
    $("#editProductStocks").val(stocks);
    $("#editProductRemainingStocks").val(remainingStocks);
    $("#editProductPrice").val(price.replace('₱', '').trim());
    $("#editProductDescription").val(description);
    $("#existingImage").val(imagePath);

    if (imagePath && imagePath !== "null") {
        $("#editProductImagePreview").attr("src", imagePath);
    } else {
        $("#editProductImagePreview").attr("src", "placeholder.jpg");
    }

    let editModal = new bootstrap.Modal(document.getElementById('editProductModal'));
    editModal.show();
}

// Image preview functionality
document.getElementById("editProductImageInput").addEventListener("change", function(event) {
    let reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById("editProductImagePreview").src = e.target.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});

$("#editProductForm").on("submit", function(event) {
    event.preventDefault();
    let formData = new FormData(this);

    $.ajax({
        url: "../Manage/Products/update_product.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log("Server Response:", response); // Debugging

            try {
                if (typeof response === "string") {
                    response = JSON.parse(response);
                }

                if (response.status === "success") {
                    $("#editProductModal").modal("hide");
                    fetchProducts();
                    Swal.fire("Success", response.message, "success");
                } else {
                    Swal.fire("Error", response.message, "error");
                }
            } catch (error) {
                console.error("JSON Parse Error:", error);
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
            Swal.fire("Error", "Failed to update product.", "error");
        }
    });
});



// Delete Product with Confirmation
function deleteProduct(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This Product will be permanently deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../Manage/Products/delete_product.php",
                type: "POST",
                data: { id },
                contentType: "application/x-www-form-urlencoded",
                success: function(response) {
                    try {
                        let res = JSON.parse(response);
                        console.log(res);  // Log the response for debugging
                        if (res.status === "success") {
                            fetchProducts();
                            Swal.fire("Deleted!", "Product has been deleted.", "success");
                        } else {
                            Swal.fire("Error", res.message, "error");
                        }
                    } catch (error) {
                        console.error("AJAX error:", error); // Log the error for debugging
                        Swal.fire("Error", "Unexpected response from server.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error); // Log AJAX error
                    Swal.fire("Error", "Failed to delete Product.", "error");
                }
            });
        }
    });
}
