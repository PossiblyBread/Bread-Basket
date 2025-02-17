<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Bread & Basket</title>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="banner position-relative mb-4">
        <img src="Assets/Images/background-image.jpg" alt="Banner" class="banner-image">
        <div class="overlay"></div>
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
            <h1 class="display-4">LOOKING FOR PERFECTLY <br>BAKED GOODS?</h1>
            <p class="lead">We got you!</p>
        </div>
    </div>
    <main>
        <section class="introduction">
            <div class="container mt-4">
                <div class="card text-center mb-4">
                    <div class="card-header">
                        Welcome to Bread & Basket Minimart!
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="font-weight: bolder; font-size: 2rem;">Fresh, Healthy, and Delicious</h5>
                        <p class="card-text" style="font-size: 1.5rem;">We provide a variety of freshly baked bread, pastries, and organic products for all your needs. Discover the best of bakery delights right here!</p>
                    </div>
                    <div class="card-footer text-muted">
                        Give us a try!
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4" id="topProducts">
            </div>
        </section>
        <section class="news">
            <h3 class="news-title text-center">Check it out!</h3>
            <div class="container mt-4">
                <div class="row text-center g-4 d-none d-md-flex">
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">Freshly Baked Breads</h5>
                            <div class="card-body">
                                <h5 class="card-title">Delicious Sourdough</h5>
                                <p class="card-text">Our signature sourdough bread, baked fresh every morning with the finest ingredients. A perfect balance of tangy and soft.</p>
                                <a href="contact.php" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">Pastry Delights</h5>
                            <div class="card-body">
                                <h5 class="card-title">Flaky Croissants</h5>
                                <p class="card-text">Buttery, flaky, and golden croissants, made with love and the highest quality ingredients. Ideal for breakfast or a quick snack!</p>
                                <a href="bakery.php" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">Seasonal Specials</h5>
                            <div class="card-body">
                                <h5 class="card-title">Pumpkin Spice Loaf</h5>
                                <p class="card-text">Our seasonal pumpkin spice loaf is back! Enjoy a moist, spiced loaf perfect for autumn or any cozy day of the year.</p>
                                <a href="bakery.php" class="btn btn-primary">Try it Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mobile view -->
                <div id="newsCarousel" class="carousel slide d-md-none" data-bs-ride="carousel" data-bs-touch="true">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card text-center">
                                <h5 class="card-header">Freshly Baked Breads</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Delicious Sourdough</h5>
                                    <p class="card-text">Our signature sourdough bread, baked fresh every morning with the finest ingredients. A perfect balance of tangy and soft.</p>
                                    <a href="#" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card text-center">
                                <h5 class="card-header">Pastry Delights</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Flaky Croissants</h5>
                                    <p class="card-text">Buttery, flaky, and golden croissants, made with love and the highest quality ingredients. Ideal for breakfast or a quick snack!</p>
                                    <a href="#" class="btn btn-primary">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card text-center">
                                <h5 class="card-header">Seasonal Specials</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Pumpkin Spice Loaf</h5>
                                    <p class="card-text">Our seasonal pumpkin spice loaf is back! Enjoy a moist, spiced loaf perfect for autumn or any cozy day of the year.</p>
                                    <a href="#" class="btn btn-primary">Try it Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <section class="explore mb-4">
        </section>
    </main>
    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function fetchTopProducts() {
            $.ajax({
                url: "Manage/User/fetch_top_products.php", 
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log("Response Data:", response);

                    if (response.status === "success") {
                        let productHTML = "";
                        response.data.forEach((product) => {
                            productHTML += `
                                <div class="col">
                                <h2 class="text-center fw-bold">Best Seller!</h2>
                                    <div class="card">
                                        <img src="Manage/${product.product_image}" class="card-img-top" alt="${product.product_name}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h3 class="card-title">${product.product_name}</h3>
                                            <p class="card-text">${product.product_description}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $("#topProducts").html(productHTML);
                    } else {
                        console.error("Error:", response.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", xhr.responseText);
                },
                complete: function () {
                    setTimeout(fetchTopProducts, 5000); 
                }
            });
        }

        $(document).ready(function () {
            fetchTopProducts(); 
        });
    </script>
</body>
<style>
</style>