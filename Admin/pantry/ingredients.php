<div class="tab-pane fade show active" id="ingredients" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addIngredientModal">Add Ingredient</button>
<div class="row mb-3">
    <div class="col-md-12 mb-2">
        <input type="text" id="searchIngredient" class="form-control" placeholder="Search ingredients...">
    </div>
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
    </div>
</div>
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
<div class="modal fade" id="editIngredientModal" tabindex="-1" aria-labelledby="editIngredientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editIngredientModalLabel">Edit Ingredient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
