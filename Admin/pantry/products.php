<div class="tab-pane fade" id="products" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
<<<<<<< Updated upstream
=======

    <!-- Search & Filters -->
    <div class="row mb-3">
        <!-- Search Bar -->
        <div class="col-md-12 mb-2">
            <input type="text" id="searchProducts" class="form-control" placeholder="Search Products...">
        </div>

        <!-- Filter by Status -->
        <div class="col-md-12 d-flex align-items-center bg-light p-3 rounded shadow-sm">
            <label class="fw-bold me-2">Filter by Status:</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterInStock" value="In Stock">
                <label class="form-check-label" for="filterInStock" style="background-color: #28a745; color: white; padding: 5px 10px; border-radius: 5px;">
                    In Stock (85%+)
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterModerate" value="Moderate">
                <label class="form-check-label" for="filterModerate" style="background-color: #ffc107; color: #343a40; padding: 5px 10px; border-radius: 5px;">
                    Moderate (50% to 85%)
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterLowStock" value="Low Stock">
                <label class="form-check-label" for="filterLowStock" style="background-color: #fd7e14; color: white; padding: 5px 10px; border-radius: 5px;">
                    Low Stock (25% to 50%)
                </label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterCritical" value="Critical">
                <label class="form-check-label" for="filterCritical" style="background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px;">
                    Critical (25% to 0%)
                </label>
            </div>
        </div>
    </div>

    <!-- Products Table -->
>>>>>>> Stashed changes
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Stocks</th>
                    <th>Remaining</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
<<<<<<< Updated upstream
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Loaf Bread</td>
                    <td>30 pcs</td>
                    <td>$4</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
=======
            <tbody id="productTable"></tbody>
>>>>>>> Stashed changes
        </table>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<<<<<<< Updated upstream
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
=======
                <form id="addProductForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label" for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="productStocks">Stocks</label>
                        <input type="number" class="form-control" id="productStocks" name="product_stocks" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="productPrice">Price</label>
                        <input type="text" class="form-control" id="productPrice" name="product_price" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="productDescription">Description</label>
                        <textarea class="form-control" id="productDescription" name="product_description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="file" id="productImageInput" name="product_image" accept="image/*" class="d-none" required>
                        <label for="productImageInput">
                            <img id="productImagePreview" alt="Upload Image" class="img-thumbnail" style="cursor: pointer; max-width: 120px; height: 120px; object-fit: cover;">
                        </label>
                        <button type="button" class="btn btn-secondary mt-2" onclick="document.getElementById('productImageInput').click();">Upload Image</button>
>>>>>>> Stashed changes
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<<<<<<< Updated upstream
=======

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" enctype="multipart/form-data">
                    <input type="hidden" id="editProductId" name="product_id">
                    <input type="hidden" id="existingImage" name="existing_image">

                    <div class="mb-3">
                        <label class="form-label" for="editProductName">Product Name</label>
                        <input type="text" class="form-control" id="editProductName" name="product_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="editProductStocks">Total Stocks</label>
                        <input type="number" class="form-control" id="editProductStocks" name="product_stocks" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="editProductRemainingStocks">Remaining Stocks</label>
                        <input type="number" class="form-control" id="editProductRemainingStocks" name="product_remaining_stocks" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="editProductPrice">Price</label>
                        <input type="number" class="form-control" id="editProductPrice" name="product_price" min="0" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="editProductDescription">Description</label>
                        <textarea class="form-control" id="editProductDescription" name="product_description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="file" id="editProductImageInput" name="product_image" accept="image/*" class="d-none">
                        <label for="editProductImageInput">
                            <img id="editProductImagePreview" alt="Upload Image" class="img-thumbnail"
                                style="cursor: pointer; max-width: 120px; height: 120px; object-fit: cover;">
                        </label>
                        <button type="button" class="btn btn-secondary mt-2" onclick="document.getElementById('editProductImageInput').click();">Upload Image</button>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/products.js"></script>

>>>>>>> Stashed changes
