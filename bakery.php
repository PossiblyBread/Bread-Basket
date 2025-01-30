<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread & Basket - Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .shop-section {
            margin-top: 90px;
            padding: 2rem 0;
        }
        .shop-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .shop-header h1 {
            font-size: 2rem;
            font-weight: bold;
        }
        .filter-dropdown {
            font-size: 1.1rem;
            font-weight: bold;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            text-align: center;
        }
        .card-title {
            font-weight: bold;
        }
        .card-text {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <section class="shop-section">
        <div class="container">
            <div class="shop-header">
                <h1>Our Bakery</h1>
                <div class="filter-dropdown">
                    <label for="filter">Filter by:</label>
                    <select id="filter" class="form-select w-auto">
                        <option value="all">All</option>
                        <option value="sweet">Sweet</option>
                        <option value="savory">Savory</option>
                        <option value="vegan">Vegan</option>
                    </select>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4" id="breadGrid">
                <div class="col">
                    <div class="card">
                        <img src="Assets/Images/kalihim.webp" class="card-img-top" alt="Kalihim">
                        <div class="card-body">
                            <h5 class="card-title">Kalihim</h5>
                            <p class="card-text">A soft, fluffy bread filled with sweet and savory filling, perfect for breakfast or snacks.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="Assets/Images/pandesal.jpeg" class="card-img-top" alt="Pandesal">
                        <div class="card-body">
                            <h5 class="card-title">Pandesal</h5>
                            <p class="card-text">A classic Filipino bread roll, slightly sweet and fluffy, enjoyed with butter or cheese.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="Assets/Images/spanishbread.jpg" class="card-img-top" alt="Spanish Bread">
                        <div class="card-body">
                            <h5 class="card-title">Spanish Bread</h5>
                            <p class="card-text">Soft bread filled with a buttery, sugary filling and a touch of cinnamon, perfect for a sweet snack.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const filterSelect = document.getElementById('filter');
        const breadGrid = document.getElementById('breadGrid');
        const breadItems = breadGrid.getElementsByClassName('col');

        filterSelect.addEventListener('change', function () {
            const filterValue = filterSelect.value.toLowerCase();

            for (let i = 0; i < breadItems.length; i++) {
                const breadItem = breadItems[i];
                const breadType = breadItem.querySelector('.card-title').textContent.toLowerCase();

                if (filterValue === 'all' || breadType.includes(filterValue)) {
                    breadItem.style.display = 'block'; 
                } else {
                    breadItem.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
