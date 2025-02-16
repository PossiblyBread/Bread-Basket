<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/admin-style.css">
    <title>Bread & Basket - Admin Dashboard</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <main class="dashboard">
        <div class="container">
            <h2 class="mb-4">Admin Dashboard</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text fs-3">120</p>
                            <a href="orders.php" class="btn btn-light">View Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-dark">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <p class="card-text fs-3">8</p>
                            <a href="orders.php?status=pending" class="btn btn-dark">Manage Orders</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Completed Orders</h5>
                            <p class="card-text fs-3">112</p>
                            <a href="orders.php?status=completed" class="btn btn-light">View History</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
<<<<<<< Updated upstream
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Inventory Status</h5>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Bread Loaves
                                    <span class="badge bg-danger">Low Stock</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Croissants
                                    <span class="badge bg-success">In Stock</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Muffins
                                    <span class="badge bg-warning text-dark">Moderate</span>
                                </li>
                            </ul>
                            <a href="inventory.php" class="btn btn-primary mt-3">Update Inventory</a>
=======
                    <div class="card text-white h-100 shadow-lg border-0 rounded-4" style="background: linear-gradient(135deg, #28a745, #218838);">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title text-uppercase fw-bold">Total Orders</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="display-3 fw-bold" id="orderTotal">0</p>
                                <div class="text-end">
                                    <p class="fs-6 text-uppercase">Total Amount</p>
                                    <p class="display-6 fw-bold" id="grandTotal">₱0</p>
                                </div>
                            </div>
                            <a href="orders.php" class="btn btn-light rounded-pill mt-3">View Orders</a>
>>>>>>> Stashed changes
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
<<<<<<< Updated upstream
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Customer Messages</h5>
                            <ul class="list-group">
                                <li class="list-group-item">"Do you offer gluten-free bread?" - Sarah</li>
                                <li class="list-group-item">"When will the sourdough be restocked?" - James</li>
                                <li class="list-group-item">"I loved the chocolate muffins!" - Anna</li>
                            </ul>
                            <a href="mailbox.php" class="btn btn-primary mt-3">View All Messages</a>
=======
                    <div class="card text-white h-100 shadow-lg border-0 rounded-4" style="background: linear-gradient(135deg, #007bff, #0056b3);">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title text-uppercase fw-bold">Sales Summary</h5>
                            <div class="d-flex justify-content-between align-items-center">
    <div>
        <p class="fs-5 text-uppercase sales-summary-month">Loading...</p> <!-- Displays "February 2025" -->
        <p class="display-3 fw-bold sales-summary-orders">0</p> <!-- Displays total orders -->
    </div>
    <div class="text-end">
        <p class="fs-6 text-uppercase">Total Amount</p>
        <p class="display-6 fw-bold sales-summary-amount">₱0</p> <!-- Displays total sales -->
    </div>
</div>


                            <a href="summary.php?status=completed" class="btn btn-light rounded-pill mt-3">View Summary</a>
>>>>>>> Stashed changes
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< Updated upstream
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="card-title">Sales Summary</h5>
                            <p class="fs-3">$2,500</p>
                            <a href="sales_report.php" class="btn btn-light">View Reports</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
=======

            <!-- Inventory Section -->
            <div class="container mt-5">
                <div class="p-4 bg-white rounded-4 shadow">
                    <h3 class="mb-4 text-center fw-bold text-dark">Inventory Status</h3>
                    <div class="row g-4">

                        <!-- Ingredients Inventory -->
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Ingredients</h5>
                                    <div class="row mt-3" id="ingredientsStock">
                                        <!-- Stock Cards will be updated dynamically -->
                                    </div>
                                    <a href="inventory.php" class="btn btn-primary w-100 rounded-pill mt-3">Update Inventory</a>
                                </div>
                            </div>
                        </div>

                        <!-- Products Inventory -->
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Products</h5>
                                    <div class="row mt-3" id="productsStock">
                                        <!-- Stock Cards will be updated dynamically -->
                                    </div>
                                    <a href="inventory.php" class="btn btn-primary w-100 rounded-pill mt-3">Update Inventory</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/dashboard.js"></script>

</html>
>>>>>>> Stashed changes
