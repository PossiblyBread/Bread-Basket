<div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addOrderModal">
        Add New Order
    </button>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#12345</td>
                    <td>John Doe</td>
                    <td>2025-02-05</td>
                    <td>$45.50</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal12345">
                            View
                        </button>
                        <a href="edit-order.php?id=12345" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete-order.php?id=12345" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalLabel">Add New Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="add-order.php" method="POST">
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="customerName" name="customerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="selectedItems" class="form-label">Selected Bakery Items</label>
                            <div class="item">
                                <select class="form-select item-select" required>
                                    <option value="Bread" data-price="2.50">Bread - $2.50</option>
                                    <option value="Cake" data-price="15.00">Cake - $15.00</option>
                                    <option value="Croissants" data-price="3.00">Croissants - $3.00</option>
                                    <option value="Muffins" data-price="4.50">Muffins - $4.50</option>
                                    <option value="Donuts" data-price="1.50">Donuts - $1.50</option>
                                    <option value="Cookies" data-price="2.00">Cookies - $2.00</option>
                                </select>
                                <button type="button" class="btn btn-primary mt-2 addItem">Add Item</button>
                            </div>
                        </div>
                        <div class="mb-3" id="itemsListContainer"></div>
                        <div class="mb-3">
                            <label for="totalAmount" class="form-label">Total Amount</label>
                            <input type="number" step="0.01" class="form-control" id="totalAmount" name="totalAmount" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const itemPrices = {
        "Bread": 2.50,
        "Cake": 15.00,
        "Croissants": 3.00,
        "Muffins": 4.50,
        "Donuts": 1.50,
        "Cookies": 2.00
    };

    // Function to update the total amount
    function updateTotal() {
        let total = 0;
        document.querySelectorAll('.item-row').forEach(itemRow => {
            const quantity = itemRow.querySelector('.item-quantity').value;
            const price = itemPrices[itemRow.querySelector('.item-select').value];
            total += price * quantity;
        });

        document.getElementById('totalAmount').value = total.toFixed(2);
    }

    // Add item to the list of selected bakery items
    document.querySelector('.addItem').addEventListener('click', function () {
        const itemSelect = document.querySelector('.item-select');
        const itemName = itemSelect.options[itemSelect.selectedIndex].text;
        const itemPrice = itemPrices[itemSelect.value];

        const itemRow = document.createElement('div');
        itemRow.classList.add('item-row', 'mb-2', 'border', 'p-2');
        itemRow.innerHTML = `
            <div class="d-flex justify-content-between align-items-center">
                <span>${itemName}</span>
                <span>($${itemPrice.toFixed(2)})</span>
                <input type="number" class="item-quantity form-control w-25" value="1" min="1">
                <button type="button" class="btn btn-danger btn-sm removeItem">Remove</button>
            </div>
        `;
        document.getElementById('itemsListContainer').appendChild(itemRow);
        itemSelect.selectedIndex = 0; // Reset the select input

        // Remove item functionality
        itemRow.querySelector('.removeItem').addEventListener('click', function () {
            itemRow.remove();
            updateTotal();
        });

        itemRow.querySelector('.item-quantity').addEventListener('input', updateTotal);

        updateTotal();
    });

    // Update the total when the page is loaded
    document.addEventListener('DOMContentLoaded', updateTotal);
</script>
