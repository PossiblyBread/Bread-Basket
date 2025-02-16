<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread & Basket - Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- ✅ jQuery loaded -->
    <style>
        .shop-section {
            margin-top: 90px;
            padding: 2rem 0;
        }
        .shop-header h1 {
            font-size: 2rem;
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
        .card-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #d9534f;
        }
    </style>
</head>
<body>

    <?php include('header.php'); ?>

    <section class="shop-section">
        <div class="container">
            <div class="shop-header">
                <h1>Our Bakery</h1>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4" id="breadGrid">
                <!-- ✅ Products will load here via AJAX -->
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function fetchProducts() {
            $.ajax({
                url: "Manage/User/fetch_products.php", // ✅ Ensure correct path
                type: "GET",
                dataType: "json",
                success: function (data) {
                    let productHTML = "";
                    data.forEach((product) => {
                        productHTML += `
                            <div class="col">
                                <div class="card">
                                    <img src="Manage/${product.product_image}" class="card-img-top" alt="${product.product_name}">
                                    <div class="card-body">
                                        <h5 class="card-title">${product.product_name}</h5>
                                        <p class="card-text">${product.product_description}</p>
                                        <p class="card-price">₱${parseFloat(product.product_price).toFixed(2)}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    $("#breadGrid").html(productHTML);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                },
                complete: function () {
                    setTimeout(fetchProducts, 3000); // ✅ Long Polling (re-fetch every 3s)
                }
            });
        }

        $(document).ready(function () {
            fetchProducts(); // ✅ Start long polling on page load
        });
    </script>

</body>
</html>
