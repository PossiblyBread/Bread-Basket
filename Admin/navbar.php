<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/CSS/admin-style.css">
    <title>Admin Navigation Bar</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid d-flex justify-content-between">
            <div class="text-white ms-2 d-flex align-items-center">
                <img src="../Assets/Images/BREAD&BASKET.png" alt="Logo" class="me-2" style="height: 40px; max-height: 40px; border-radius: 50px;">
                Bread & Basket Minimart
            </div>
            <button class="btn btn-dark d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                &#9776;
            </button>
        </div>
    </nav>
    <div class="d-none d-lg-block bg-dark" id="desktopSidebar" style="position: fixed; right: 0; top: 0; height: 100%; max-width: 280px;">
        <div class="offcanvas-header text-white">
            <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="inventory.php">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="mailbox.php">Mailbox</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="orders.php">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="configure.php">Configure</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Settings</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="mobileSidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="inventory.php">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="mailbox.php">Mailbox</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="orders.php">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="configure.php">Configure</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Settings</a>
                </li>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
