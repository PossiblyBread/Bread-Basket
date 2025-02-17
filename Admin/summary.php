<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread & Basket - Sales Summary</title>
    <link rel="stylesheet" href="../Assets/CSS/admin-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <?php include('navbar.php'); ?>
    <main class="summary container py-4">
        <h2 class="mb-4 fw-bold mt-5">Sales Summary</h2>
        <div class="card p-4 shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-3 d-flex align-items-center">
                    <label class="fw-bold me-2">Year:</label>
                    <select id="yearSelect" class="form-select w-50">
                        <option value="All" selected>All Years</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <label class="fw-bold me-2">Month:</label>
                    <select id="monthSelect" class="form-select w-50">
                        <option value="All" selected>All Months</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>
        </div>
        <div id="transactionsContainer" class="mt-4"></div>
    </main>
   <script src="js/summary.js"></script>
</body>
</html>
