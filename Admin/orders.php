<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread & Basket - Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <?php include('navbar.php'); ?>

    <main class="container py-4">
        <h2 class="mb-4 fw-bold mt-5">Manage Orders</h2> <!-- Added mt-5 to prevent overlap -->

        <!-- Orders Section -->
        <div class="card shadow-sm border-0 rounded-4 p-3">
            <div class="d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addOrderModal">
                    + Add New Order
                </button>
                <h4 class="text-dark fw-bold">Grand Total: <span class="text-success">$5000</span></h4>
            </div>

            <div class="table-responsive mt-3">
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
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewOrderModal">
                                    View
                                </button>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

      <!-- Add New Order Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="add-order.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control" name="customerName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Selected Bakery Items</label>
                        <select class="form-select item-select">
                            <option value="Bread" data-price="2.50">Bread - $2.50</option>
                            <option value="Cake" data-price="15.00">Cake - $15.00</option>
                            <option value="Croissants" data-price="3.00">Croissants - $3.00</option>
                        </select>
                        <button type="button" class="btn btn-primary mt-2 addItem">Add Item</button>
                    </div>
                    <div class="mb-3" id="addItemsListContainer"></div>
                    <div class="mb-3">
                        <label class="form-label">Total Amount</label>
                        <input type="number" class="form-control" id="addTotalAmount" name="totalAmount" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Order</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const addItemButton = document.querySelector(".addItem");
    const itemSelect = document.querySelector(".item-select");
    const itemsListContainer = document.getElementById("addItemsListContainer");
    const totalAmountInput = document.getElementById("addTotalAmount");

    let selectedItems = {}; // Object to store selected items and quantities

    addItemButton.addEventListener("click", function () {
        const selectedOption = itemSelect.options[itemSelect.selectedIndex];
        const itemName = selectedOption.value;
        const itemPrice = parseFloat(selectedOption.getAttribute("data-price"));

        if (selectedItems[itemName]) {
            selectedItems[itemName].quantity++;
        } else {
            selectedItems[itemName] = { price: itemPrice, quantity: 1 };
        }
        renderItems();
    });

    function renderItems() {
        itemsListContainer.innerHTML = "";
        Object.keys(selectedItems).forEach(itemName => {
            const item = selectedItems[itemName];
            const itemDiv = document.createElement("div");
            itemDiv.classList.add("d-flex", "justify-content-between", "align-items-center", "border", "p-2", "mb-2");
            itemDiv.innerHTML = `
                <span>${itemName} - $${item.price.toFixed(2)} x <strong>${item.quantity}</strong></span>
                <div>
                    <button class="btn btn-sm btn-secondary decreaseItem">-</button>
                    <button class="btn btn-sm btn-secondary increaseItem">+</button>
                    <button class="btn btn-danger btn-sm removeItem">Remove</button>
                </div>
            `;

            // Increase quantity
            itemDiv.querySelector(".increaseItem").addEventListener("click", function () {
                selectedItems[itemName].quantity++;
                renderItems();
            });

            // Decrease quantity
            itemDiv.querySelector(".decreaseItem").addEventListener("click", function () {
                if (selectedItems[itemName].quantity > 1) {
                    selectedItems[itemName].quantity--;
                } else {
                    delete selectedItems[itemName];
                }
                renderItems();
            });

            // Remove item
            itemDiv.querySelector(".removeItem").addEventListener("click", function () {
                delete selectedItems[itemName];
                renderItems();
            });

            itemsListContainer.appendChild(itemDiv);
        });
        updateTotal();
    }

    function updateTotal() {
        let total = Object.values(selectedItems).reduce((sum, item) => sum + (item.price * item.quantity), 0);
        totalAmountInput.value = total.toFixed(2);
    }
});
</script>




        <!-- View Order Modal (Centered) -->
        <div class="modal fade" id="viewOrderModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Customer Name:</strong> John Doe</p>
                        <p><strong>Order Date:</strong> 2025-02-05</p>
                        <p><strong>Total Amount:</strong> $45.50</p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub-Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bread</td>
                                    <td>$2.50</td>
                                    <td>2</td>
                                    <td>$5.00</td>
                                </tr>
                                <tr>
                                    <td>Cake</td>
                                    <td>$15.00</td>
                                    <td>1</td>
                                    <td>$15.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Order Modal (Centered) -->
<div class="modal fade" id="editOrderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="edit-order.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control" name="customerName" value="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Selected Bakery Items</label>
                        <div id="editItemsListContainer"></div>
                        <select class="form-select item-select mt-3">
                            <option value="Bread" data-price="2.50">Bread - $2.50</option>
                            <option value="Cake" data-price="15.00">Cake - $15.00</option>
                            <option value="Croissants" data-price="3.00">Croissants - $3.00</option>
                        </select>
                        <button type="button" class="btn btn-primary mt-2 addItem">Add Item</button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total Amount</label>
                        <input type="number" class="form-control" id="editTotalAmount" name="totalAmount" value="45.50" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const editItemsListContainer = document.getElementById("editItemsListContainer");
    const editTotalAmountInput = document.getElementById("editTotalAmount");
    const addItemButton = document.querySelector("#editOrderModal .addItem");
    const itemSelect = document.querySelector("#editOrderModal .item-select");

    let selectedItems = {
        "Bread": { price: 2.50, quantity: 2 },
        "Cake": { price: 15.00, quantity: 1 }
    };

    function renderItems() {
        editItemsListContainer.innerHTML = "";
        Object.keys(selectedItems).forEach(itemName => {
            const item = selectedItems[itemName];
            const itemDiv = document.createElement("div");
            itemDiv.classList.add("d-flex", "justify-content-between", "align-items-center", "border", "p-2", "mb-2");
            itemDiv.innerHTML = `
                <span>${itemName} - $${item.price.toFixed(2)} x <strong>${item.quantity}</strong></span>
                <div>
                    <button class="btn btn-sm btn-secondary decreaseItem">-</button>
                    <button class="btn btn-sm btn-secondary increaseItem">+</button>
                </div>
            `;

            // Increase quantity
            itemDiv.querySelector(".increaseItem").addEventListener("click", function () {
                selectedItems[itemName].quantity++;
                renderItems();
            });

            // Decrease quantity
            itemDiv.querySelector(".decreaseItem").addEventListener("click", function () {
                if (selectedItems[itemName].quantity > 1) {
                    selectedItems[itemName].quantity--;
                } else {
                    delete selectedItems[itemName];
                }
                renderItems();
            });

            editItemsListContainer.appendChild(itemDiv);
        });
        updateTotal();
    }

    function updateTotal() {
        let total = Object.values(selectedItems).reduce((sum, item) => sum + (item.price * item.quantity), 0);
        editTotalAmountInput.value = total.toFixed(2);
    }

    addItemButton.addEventListener("click", function () {
        const selectedOption = itemSelect.options[itemSelect.selectedIndex];
        const itemName = selectedOption.value;
        const itemPrice = parseFloat(selectedOption.getAttribute("data-price"));

        if (selectedItems[itemName]) {
            selectedItems[itemName].quantity++;
        } else {
            selectedItems[itemName] = { price: itemPrice, quantity: 1 };
        }
        renderItems();
    });

    renderItems();
});
</script>

    </main>
</body>
</html>
