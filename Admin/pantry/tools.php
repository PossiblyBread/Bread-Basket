<div class="tab-pane fade" id="tools" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addToolModal">Add Tool</button>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Baking Pan</td>
                    <td>Large</td>
                    <td>10 pcs</td>
                    <td>Baking</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editToolModal" onclick="editTool(1, 'Baking Pan', 'Large', '10 pcs', 'Baking')">Edit</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="addToolModal" tabindex="-1" aria-labelledby="addToolModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToolModalLabel">Add New Tool</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" placeholder="Enter item name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <input type="text" class="form-control" placeholder="Enter size" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" placeholder="Enter quantity" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" required>
                            <option value="Baking">Baking</option>
                            <option value="Measuring">Measuring</option>
                            <option value="Mixing">Mixing</option>
                            <option value="Cutting">Cutting</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Add Tool</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editToolModal" tabindex="-1" aria-labelledby="editToolModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editToolModalLabel">Edit Tool</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editToolForm">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" id="editToolName" class="form-control" placeholder="Enter item name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <input type="text" id="editToolSize" class="form-control" placeholder="Enter size" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" id="editToolQuantity" class="form-control" placeholder="Enter quantity" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select id="editToolCategory" class="form-select" required>
                            <option value="Baking">Baking</option>
                            <option value="Measuring">Measuring</option>
                            <option value="Mixing">Mixing</option>
                            <option value="Cutting">Cutting</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Tool</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editTool(id, name, size, quantity, category) {
        document.getElementById('editToolName').value = name;
        document.getElementById('editToolSize').value = size;
        document.getElementById('editToolQuantity').value = quantity;
        document.getElementById('editToolCategory').value = category;
    }
    document.getElementById('editToolForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const updatedName = document.getElementById('editToolName').value;
        const updatedSize = document.getElementById('editToolSize').value;
        const updatedQuantity = document.getElementById('editToolQuantity').value;
        const updatedCategory = document.getElementById('editToolCategory').value;
        console.log('Updated Tool:', updatedName, updatedSize, updatedQuantity, updatedCategory);
        $('#editToolModal').modal('hide');
    });
</script>
