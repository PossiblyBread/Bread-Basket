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
                <tr data-stock="Moderate">
                    <td class="text-center">
                        <img src="https://via.placeholder.com/80" alt="Croissant" class="img-thumbnail" 
                             style="width: 80px; height: 80px; object-fit: cover;">
                    </td>
                    <td>Croissant</td>
                    <td>15 pcs</td>
                    <td>$2.50</td>
                    <td><span class="badge bg-warning">Moderate</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr data-stock="Low Stock">
                    <td class="text-center">
                        <img src="https://via.placeholder.com/80" alt="Baguette" class="img-thumbnail" 
                             style="width: 80px; height: 80px; object-fit: cover;">
                    </td>
                    <td>Baguette</td>
                    <td>5 pcs</td>
                    <td>$3</td>
                    <td><span class="badge bg-danger">Low Stock</span></td>
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

    // Filter Table Based on Stock Status
    document.querySelectorAll(".stock-filter").forEach(checkbox => {
        checkbox.addEventListener("change", filterProductTable);
    });

    function filterProductTable() {
        let inStockChecked = document.getElementById("filterInStock").checked;
        let moderateChecked = document.getElementById("filterModerate").checked;
        let lowStockChecked = document.getElementById("filterLowStock").checked;

        let isAnyChecked = inStockChecked || moderateChecked || lowStockChecked;

        document.querySelectorAll("#productTable tr").forEach(row => {
            let stockStatus = row.getAttribute("data-stock");

            if (!isAnyChecked) {
                row.style.display = ""; // Show all if no filters are checked
            } else if (
                (stockStatus === "In Stock" && inStockChecked) ||
                (stockStatus === "Moderate" && moderateChecked) ||
                (stockStatus === "Low Stock" && lowStockChecked)
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
</script>