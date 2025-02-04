<div class="tab-pane fade show active" id="ingredients" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addIngredientModal">Add Ingredient</button>
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
