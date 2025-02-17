
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/CSS/admin-style.css">
    <title>Bread & Basket - Admin Dashboard</title>
</head>
<body class="bg-light">
    <?php include('navbar.php'); ?>
    <main class="dashboard">
        <div class="container py-4">
            <h2 class="p-3 text-dark fw-bold">Admin Dashboard</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card text-white h-100 shadow-lg border-0 rounded-4 bg-success">
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
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white h-100 shadow-lg border-0 rounded-4 bg-primary">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title text-uppercase fw-bold">Sales Summary</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="fs-5 text-uppercase sales-summary-month">Loading...</p>
                                    <p class="display-3 fw-bold sales-summary-orders">0</p>
                                </div>
                                <div class="text-end">
                                    <p class="fs-6 text-uppercase">Total Amount</p>
                                    <p class="display-6 fw-bold sales-summary-amount">₱0</p>
                                </div>
                            </div>
                            <a href="summary.php?status=completed" class="btn btn-light rounded-pill mt-3">View Summary</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="p-4 bg-white rounded-4 shadow">
                    <h3 class="mb-4 text-center fw-bold text-dark">Inventory Status</h3>
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Ingredients</h5>
                                    <div class="row mt-3" id="ingredientsStock"></div>
                                    <a href="inventory.php" class="btn btn-primary w-100 rounded-pill mt-3">Update Inventory</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 rounded-4">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Products</h5>
                                    <div class="row mt-3" id="productsStock"></div>
                                    <a href="inventory.php" class="btn btn-primary w-100 rounded-pill mt-3">Update Inventory</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>
<style>
    @media (max-width: 991px) {
        .card-body {
            padding-top: 10px;
        }
    }@media (max-width: 768px) {
        .card-body {
            padding-top: 10px;
        }
    }
</style>