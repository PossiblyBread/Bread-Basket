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
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Customer Messages</h5>
                            <ul class="list-group">
                                <li class="list-group-item">"Do you offer gluten-free bread?" - Sarah</li>
                                <li class="list-group-item">"When will the sourdough be restocked?" - James</li>
                                <li class="list-group-item">"I loved the chocolate muffins!" - Anna</li>
                            </ul>
                            <a href="mailbox.php" class="btn btn-primary mt-3">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
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