<div class="tab-pane fade" id="products" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
    <div class="row mb-3">
        <div class="col-md-12 mb-2">
            <input type="text" id="searchProducts" class="form-control" placeholder="Search Products...">
        </div>
        <div class="col-md-12 d-flex align-items-center bg-light p-3 rounded shadow-sm">
            <label class="fw-bold me-2">Filter by Status:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterInStock" value="In Stock">
                <label class="form-check-label filter-badge bg-success text-white" for="filterInStock">In Stock (85%+)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterModerate" value="Moderate">
                <label class="form-check-label filter-badge bg-warning text-dark" for="filterModerate">Moderate (50% to 85%)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" value="Low Stock">
                <label class="form-check-label text-white px-2 py-1 rounded" style="background-color: #fd7e14;">Low Stock (25% - 50%)</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterCritical" value="Critical">
                <label class="form-check-label filter-badge bg-danger text-white" for="filterCritical">Critical (25% to 0%)</label>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Item Name</th>
                    <th>Stocks</th>
                    <th>Remaining</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productTable"></tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
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
                        <input type="number" class="form-control" id="productPrice" name="product_price" min="0" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="productDescription">Description</label>
                        <textarea class="form-control" id="productDescription" name="product_description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="file" id="productImageInput" name="product_image" accept="image/*" class="d-none" required>
                        <label for="productImageInput" class="image-upload-label">
                            <img id="productImagePreview" alt="Upload Image" class="img-thumbnail preview-image">
                        </label>
                        <button type="button" class="btn btn-secondary mt-2" onclick="document.getElementById('productImageInput').click();">Upload Image</button>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                        <label for="editProductImageInput" class="image-upload-label">
                            <img id="editProductImagePreview" alt="Upload Image" class="img-thumbnail preview-image">
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
<style>
    .filter-badge {
        padding: 5px 10px;
        border-radius: 5px;
    }
    .image-upload-label {
        cursor: pointer;
    }
    .preview-image {
        max-width: 120px;
        height: 120px;
        object-fit: cover;
    }
</style>
