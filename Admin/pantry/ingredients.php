<div class="tab-pane fade show active" id="ingredients" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addIngredientModal">Add Ingredient</button>

    <!-- Search Bar and Filters in the Same Row -->
    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" id="searchIngredient" class="form-control" placeholder="Search ingredients...">
        </div>
        <div class="col-md-8 d-flex align-items-center bg-light p-2 rounded shadow-sm">
            <label class="fw-bold me-2">Filter by Status:</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterInStock">
                <label class="form-check-label fw-bold text-success" for="filterInStock">In Stock</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterModerate">
                <label class="form-check-label fw-bold text-warning" for="filterModerate">Moderate</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input status-filter" type="checkbox" id="filterLowStock">
                <label class="form-check-label fw-bold text-danger" for="filterLowStock">Low Stock</label>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="ingredientTable">
                <tr data-status="In Stock">
                    <td>1</td>
                    <td>Flour</td>
                    <td>50 kg</td>
                    <td>Powder</td>
                    <td><span class="badge bg-success">In Stock</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editIngredientModal" onclick="editIngredient(1, 'Flour', '50 kg', 'Powder')">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr data-status="Moderate">
                    <td>2</td>
                    <td>Sugar</td>
                    <td>20 kg</td>
                    <td>Sweeteners</td>
                    <td><span class="badge bg-warning">Moderate</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editIngredientModal" onclick="editIngredient(2, 'Sugar', '20 kg', 'Sweeteners')">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                <tr data-status="Low Stock">
                    <td>3</td>
                    <td>Butter</td>
                    <td>5 kg</td>
                    <td>Dairy</td>
                    <td><span class="badge bg-danger">Low Stock</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editIngredientModal" onclick="editIngredient(3, 'Butter', '5 kg', 'Dairy')">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Ingredient Search Filter
    document.getElementById('searchIngredient').addEventListener('keyup', function () {
        let searchQuery = this.value.toLowerCase();
        let rows = document.querySelectorAll("#ingredientTable tr");

        rows.forEach(row => {
            let itemName = row.cells[1].textContent.toLowerCase();
            row.style.display = itemName.includes(searchQuery) ? "" : "none";
        });
    });

    // Filter Table Based on Checkbox Selection
    document.querySelectorAll(".status-filter").forEach(checkbox => {
        checkbox.addEventListener("change", filterTable);
    });

    function filterTable() {
        let inStockChecked = document.getElementById("filterInStock").checked;
        let moderateChecked = document.getElementById("filterModerate").checked;
        let lowStockChecked = document.getElementById("filterLowStock").checked;

        let isAnyChecked = inStockChecked || moderateChecked || lowStockChecked;

        document.querySelectorAll("#ingredientTable tr").forEach(row => {
            let status = row.getAttribute("data-status");

            if (!isAnyChecked) {
                row.style.display = ""; // Show all if no filters are checked
            } else if (
                (status === "In Stock" && inStockChecked) ||
                (status === "Moderate" && moderateChecked) ||
                (status === "Low Stock" && lowStockChecked)
            ) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    function editIngredient(id, name, quantity, category) {
        document.getElementById('editItemName').value = name;
        document.getElementById('editQuantity').value = quantity;
        document.getElementById('editCategory').value = category;
    }

    document.getElementById('editIngredientForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const updatedName = document.getElementById('editItemName').value;
        const updatedQuantity = document.getElementById('editQuantity').value;
        const updatedCategory = document.getElementById('editCategory').value;
        console.log('Updated Ingredient:', updatedName, updatedQuantity, updatedCategory);
        $('#editIngredientModal').modal('hide');
    });

    // Ensure checkboxes start unchecked
    document.querySelectorAll(".status-filter").forEach(checkbox => {
        checkbox.checked = false;
    });
</script>
