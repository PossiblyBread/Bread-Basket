<div class="tab-pane fade show active" id="ingredients" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addIngredientModal">Add Ingredient</button>
<<<<<<< Updated upstream
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Flour</td>
                    <td>50 kg</td>
                    <td>Powder</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editIngredientModal" onclick="editIngredient(1, 'Flour', '50 kg', 'Powder')">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
=======

   <!-- Search & Filters -->
<div class="row mb-3">
    <!-- Search bar on top -->
    <div class="col-md-12 mb-2">
        <input type="text" id="searchIngredient" class="form-control" placeholder="Search ingredients...">
    </div>

    <!-- Filter by Status below the search bar -->
    <div class="col-md-12 d-flex align-items-center bg-light p-3 rounded shadow-sm">
        <label class="fw-bold me-2">Filter by Status:</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input status-filter" type="checkbox" value="In Stock">
            <label class="form-check-label" style="background-color: #28a745; color: white; padding: 5px 10px; border-radius: 5px;">In Stock (85%+)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input status-filter" type="checkbox" value="Moderate">
            <label class="form-check-label" style="background-color: #ffc107; color: #343a40; padding: 5px 10px; border-radius: 5px;">Moderate (50% to 85%)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input status-filter" type="checkbox" value="Low Stock">
            <label class="form-check-label" style="background-color: #fd7e14; color: white; padding: 5px 10px; border-radius: 5px;">Low Stock (25% to 50%)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input status-filter" type="checkbox" value="Critical">
            <label class="form-check-label" style="background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px;">Critical (25% to 0%)</label>
        </div>
>>>>>>> Stashed changes
    </div>
</div>
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

<<<<<<< Updated upstream
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
=======



    <!-- Ingredient Table -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Total Stock</th>
                <th>Remaining Stock</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="ingredientTable"></tbody>
    </table>
</div>

<!-- Add Ingredient Modal -->
<div class="modal fade" id="addIngredientModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add Ingredient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="addItemName" class="form-control mb-2" placeholder="Name">
                <input type="number" id="addStocks" class="form-control mb-2" placeholder="Total Stocks">
                <button class="btn btn-primary w-100" onclick="addIngredient()">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Ingredient Modal -->
<div class="modal fade" id="editIngredientModal" tabindex="-1" aria-labelledby="editIngredientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editIngredientModalLabel">Edit Ingredient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Ingredient Edit Form -->
                <input type="hidden" id="editIngredientId">
                <input type="text" id="editIngredientName" class="form-control mb-2" placeholder="Ingredient Name">
                <input type="number" id="editIngredientStocks" class="form-control mb-2" placeholder="Total Stocks">
                <input type="number" id="editIngredientRemainingStocks" class="form-control mb-2" placeholder="Remaining Stocks">
                <button class="btn btn-primary w-100" onclick="updateIngredient()">Save Changes</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/ingredients.js"></script>
>>>>>>> Stashed changes
