<div class="tab-pane fade" id="tools" role="tabpanel">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addToolModal">Add Tool</button>

    <!-- Search & Filters -->
    <div class="row mb-3">
        <div class="col-md-12 mb-2">
            <input type="text" id="searchTools" class="form-control" placeholder="Search tools...">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Item Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="toolsTableBody">
                <!-- Tools will be populated here by JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!-- Add Tool Modal -->
<div class="modal fade" id="addToolModal" tabindex="-1" aria-labelledby="addToolModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToolModalLabel">Add New Tool</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addToolForm">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter item name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <input type="text" class="form-control" name="size" placeholder="Enter size" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category" required>
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

<!-- Edit Tool Modal -->
<div class="modal fade" id="editToolModal" tabindex="-1" aria-labelledby="editToolModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editToolModalLabel">Edit Tool</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editToolForm">
                    <input type="hidden" id="editToolId" name="id">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" id="editToolName" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <input type="text" id="editToolSize" class="form-control" name="size" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" id="editToolQuantity" class="form-control" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select id="editToolCategory" class="form-select" name="category" required>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="./js/tools.js"></script>
