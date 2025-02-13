<div class="tab-pane fade" id="products" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
    
    <!-- Search and Filters -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" id="searchProduct" class="form-control" placeholder="Search products...">
        </div>
        <div class="col-md-8 d-flex align-items-center bg-light p-2 rounded shadow-sm">
            <label class="fw-bold me-2">Filter by Stock:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input stock-filter" type="checkbox" id="filterInStock">
                <label class="form-check-label fw-bold text-success" for="filterInStock">In Stock</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input stock-filter" type="checkbox" id="filterModerate">
                <label class="form-check-label fw-bold text-warning" for="filterModerate">Moderate</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input stock-filter" type="checkbox" id="filterLowStock">
                <label class="form-check-label fw-bold text-danger" for="filterLowStock">Low Stock</label>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productTable">
                <tr data-stock="In Stock">
                    <td class="text-center">
                        <img src="https://assets.bonappetit.com/photos/64ac604a047251c7e5ee272e/1:1/w_3625,h_3625,c_limit/20230509-0823-APPLIANCES-30922.jpg" 
                             alt="Loaf Bread" class="img-thumbnail" 
                             style="width: 80px; height: 80px; object-fit: cover;">
                    </td>
                    <td>Loaf Bread</td>
                    <td>30 pcs</td>
                    <td>$4</td>
                    <td><span class="badge bg-success">In Stock</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Product Search Filter
    document.getElementById('searchProduct').addEventListener('keyup', function () {
        let searchQuery = this.value.toLowerCase();
        let rows = document.querySelectorAll("#productTable tr");

        rows.forEach(row => {
            let itemName = row.cells[1].textContent.toLowerCase();
            row.style.display = itemName.includes(searchQuery) ? "" : "none";
        });
    });

    function filterProductTable() {
    let filters = {
        'In Stock': document.getElementById("filterInStock").checked,
        'Moderate': document.getElementById("filterModerate").checked,
        'Low Stock': document.getElementById("filterLowStock").checked
    };

    let isAnyChecked = Object.values(filters).some(val => val); // Check if any filter is selected

    document.querySelectorAll("#productTable tr").forEach(row => {
        let stockStatus = row.getAttribute("data-stock");

        // Show all if no filters are selected
        if (!isAnyChecked) {
            row.style.display = "";
            return;
        }

        // Show only matching rows
        row.style.display = filters[stockStatus] ? "" : "none";
    });
}

// Attach event listeners to checkboxes
document.querySelectorAll(".stock-filter").forEach(checkbox => {
    checkbox.addEventListener("change", filterProductTable);
});
</script>


<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" placeholder="Enter item name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter quantity">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" placeholder="Enter price">
                    </div>
                    <div class="mb-3 text-center">
                        <input type="file" id="addProductImageInput" accept="image/*" class="d-none">
                        <label for="addProductImageInput" class="d-block">
                            <img id="addImagePreview" src="https://via.placeholder.com/120" 
                                 alt="Upload Image" class="img-thumbnail" 
                                 style="cursor: pointer; max-width: 120px; height: 120px; object-fit: cover;">
                        </label>
                        <button type="button" class="btn btn-secondary mt-2" onclick="document.getElementById('addProductImageInput').click();">
                            Upload Image
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" placeholder="Enter item name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter quantity">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" placeholder="Enter price">
                    </div>
                    <div class="mb-3 text-center">
                        <input type="file" id="editProductImageInput" accept="image/*" class="d-none">
                        <label for="editProductImageInput" class="d-block">
                            <img id="editImagePreview" src="https://via.placeholder.com/120" 
                                 alt="Upload Image" class="img-thumbnail" 
                                 style="cursor: pointer; max-width: 120px; height: 120px; object-fit: cover;">
                        </label>
                        <button type="button" class="btn btn-secondary mt-2" onclick="document.getElementById('editProductImageInput').click();">
                            Upload Image
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function setupImagePreview(inputId, previewId) {
        document.getElementById(inputId).addEventListener('change', function(event) {
            const imagePreview = document.getElementById(previewId);
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }

    setupImagePreview('addProductImageInput', 'addImagePreview');
    setupImagePreview('editProductImageInput', 'editImagePreview');
</script>
