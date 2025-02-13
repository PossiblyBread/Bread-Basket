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

<!-- Add Product Modal -->
<div class="modal fade" id="addIngredientModal" tabindex="-1" aria-labelledby="addIngredientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIngredientModalLabel">Add New Ingredient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" placeholder="Enter item name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter quantity" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" required>
                            <option value="canned">Canned</option>
                            <option value="dairy">Dairy</option>
                            <option value="powder">Powder</option>
                            <option value="spices">Spices</option>
                            <option value="grains">Grains</option>
                            <option value="sweeteners">Sweeteners</option>
                            <option value="fats_oils">Fats & Oils</option>
                            <option value="leavening_agents">Leavening Agents</option>
                            <option value="preservatives">Preservatives</option>
                            <option value="nuts_seeds">Nuts & Seeds</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Ingredient</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Product Modal -->
<div class="modal fade" id="editIngredientModal" tabindex="-1" aria-labelledby="editIngredientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editIngredientModalLabel">Edit Ingredient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editIngredientForm">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" id="editItemName" class="form-control" placeholder="Enter item name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" id="editQuantity" class="form-control" placeholder="Enter quantity" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select id="editCategory" class="form-select" required>
                            <option value="canned">Canned</option>
                            <option value="dairy">Dairy</option>
                            <option value="powder">Powder</option>
                            <option value="spices">Spices</option>
                            <option value="grains">Grains</option>
                            <option value="sweeteners">Sweeteners</option>
                            <option value="fats_oils">Fats & Oils</option>
                            <option value="leavening_agents">Leavening Agents</option>
                            <option value="preservatives">Preservatives</option>
                            <option value="nuts_seeds">Nuts & Seeds</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Ingredient</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>



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
