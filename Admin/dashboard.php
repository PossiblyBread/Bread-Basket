<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/admin-style.css">
    <title>Bread & Basket - Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <?php include('navbar.php'); ?>
    <main class="dashboard">
        <div class="container py-4">
            <h2 class="p-3 text-dark fw-bold">Admin Dashboard</h2>

            <!-- Orders Overview -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card text-white h-100 shadow-lg border-0 rounded-4" style="background: linear-gradient(135deg, #28a745, #218838);">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title text-uppercase fw-bold">Total Orders</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="display-3 fw-bold">120</p>
                                <div class="text-end">
                                    <p class="fs-6 text-uppercase">Total Amount</p>
                                    <p class="display-6 fw-bold">₱2500</p>
                                </div>
                            </div>
                            <a href="orders.php" class="btn btn-light rounded-pill mt-3">View Orders</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card text-white h-100 shadow-lg border-0 rounded-4" style="background: linear-gradient(135deg, #007bff, #0056b3);">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title text-uppercase fw-bold">SALES SUMMARY</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="display-3 fw-bold">112</p>
                                <div class="text-end">
                                    <p class="fs-6 text-uppercase">Total Amount</p>
                                    <p class="display-6 fw-bold">₱2000</p>
                                </div>
                            </div>
                            <a href="summary.php?status=completed" class="btn btn-light rounded-pill mt-3">View Summary</a>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="card bg-success text-white shadow">
                                                <div class="card-body text-center">
                                                    <h6>In Stock</h6>
                                                    <h2 class="fw-bold">150</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card bg-warning text-dark shadow">
                                                <div class="card-body text-center">
                                                    <h6>Moderate</h6>
                                                    <h2 class="fw-bold">50</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card bg-danger text-white shadow">
                                                <div class="card-body text-center">
                                                    <h6>Low Stock</h6>
                                                    <h2 class="fw-bold">10</h2>
                                                </div>
                                            </div>
                                        </div>
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
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="card bg-success text-white shadow">
                                                <div class="card-body text-center">
                                                    <h6>In Stock</h6>
                                                    <h2 class="fw-bold">200</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card bg-warning text-dark shadow">
                                                <div class="card-body text-center">
                                                    <h6>Moderate</h6>
                                                    <h2 class="fw-bold">80</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card bg-danger text-white shadow">
                                                <div class="card-body text-center">
                                                    <h6>Low Stock</h6>
                                                    <h2 class="fw-bold">20</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="inventory.php" class="btn btn-primary w-100 rounded-pill mt-3">Update Inventory</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Messages -->
            <div class="container mt-5">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">Customer Messages</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item border-0">"Do you offer gluten-free bread?" - Sarah</li>
                            <li class="list-group-item border-0">"When will the sourdough be restocked?" - James</li>
                            <li class="list-group-item border-0">"I loved the chocolate muffins!" - Anna</li>
                        </ul>
                        <a href="mailbox.php" class="btn btn-primary rounded-pill w-100 mt-3">View All Messages</a>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
