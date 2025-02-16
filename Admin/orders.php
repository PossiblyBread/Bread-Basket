<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< Updated upstream
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread & Basket - Orders</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <main class="container orders">
        <h2 class="mb-4">Manage Orders</h2>
        <ul class="nav nav-tabs" id="orderTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">Pending</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Completed</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="trash-tab" data-bs-toggle="tab" data-bs-target="#trash" type="button" role="tab">Trash</button>
            </li>
        </ul>
        <div class="tab-content mt-3" id="orderTabsContent">
            <?php include('orders/pending.php'); ?>
            <?php include('orders/completed.php'); ?>
            <?php include('orders/trash.php'); ?>
        </div>
    </main>
=======
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Assets/CSS/admin-style.css">
  <title>Bread & Basket - Orders</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <?php include('navbar.php'); ?>

  <main class="order container py-4">
    <h2 class="mb-4 fw-bold mt-5">Manage Orders</h2>

    <!-- Orders Section -->
    <div class="card shadow-sm border-0 rounded-4 p-3">
      <div class="d-flex justify-content-between align-items-center">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addOrderModal">
          + Add New Order
        </button>
        <h4 class="text-dark fw-bold">Grand Total: <span class="text-success" id="grandTotal">0</span></h4>
      </div>

      <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Customer Name</th>
              <th scope="col">Order Date</th>
              <th scope="col">Total Amount</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody id="ordersTable">
            <!-- Orders will be inserted dynamically via AJAX -->
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
            <form id="orderForm" method="POST">
              <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input type="text" class="form-control" name="customerName" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Selected Bakery Items</label>
                <select id="item-select" class="form-select">
                  <option value="" disabled selected hidden>Select a product</option>
                </select>
                <button type="button" class="btn btn-primary mt-2 addItem">Add Item</button>
              </div>
              <div class="mb-3" id="addItemsListContainer">
                <p class="text-muted">No items added.</p>
              </div>
              <div class="mb-3">
                <label class="form-label">Total Amount</label>
                <input type="number" class="form-control" id="addTotalAmount" name="totalAmount" readonly value="0.00">
              </div>
              <button type="submit" class="btn btn-primary">Add Order</button>
            </form>
          </div>
        </div>
      </div>
    </div>

      <!-- View Order Modal (Centered) -->
    <div class="modal fade" id="viewOrderModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">View Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p><strong>Customer Name:</strong> <span id="viewCustomerName"></span></p>
            <p><strong>Order Date:</strong> <span id="viewOrderDate"></span></p>
            <p><strong>Total Amount:</strong><span id="viewTotalAmount"></span></p>
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Sub-Total</th>
                </tr>
              </thead>
              <tbody id="viewOrderItems">
                <!-- Items will be inserted dynamically -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/orders.js"></script>
>>>>>>> Stashed changes
</body>
</html>
<style>
    .orders {
        padding-right: 220px;
    }
    .orders .modal {
        margin-top: 100px;   
        padding-right: 220px;   
    }
    @media (max-width: 991px) {
        .orders {
            padding-right: 0;
        }
        .orders .modal {
            padding-right: 0;   
        }
    }
</style>