<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread & Basket - Inventory</title>
</head>
<body>
    <?php include('navbar.php'); ?>
    <main class="container mt-4 pantry">
        <h2 class="mb-4">Inventory Management</h2>
        <ul class="nav nav-tabs" id="inventoryTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="ingredients-tab" data-bs-toggle="tab" data-bs-target="#ingredients" type="button" role="tab">Ingredients</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tools-tab" data-bs-toggle="tab" data-bs-target="#tools" type="button" role="tab">Tools</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab">Products</button>
            </li>
        </ul>
        <!-- Tab Content -->
        <div class="tab-content mt-3" id="inventoryTabsContent">
            <?php include('pantry/ingredients.php'); ?>
            <?php include('pantry/tools.php'); ?>
            <?php include('pantry/products.php'); ?>
        </div>
    </main>
</body>
</html>