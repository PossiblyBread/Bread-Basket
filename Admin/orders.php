<!DOCTYPE html>
<html lang="en">
<head>
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