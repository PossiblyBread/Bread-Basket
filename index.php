<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/CSS/style.css">
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
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col px-4">
                    <div class="card">
                        <img src="Assets/Images/kalihim.webp" class="card-img-top" alt="Kalihim" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Kalihim</h5>
                            <p class="card-text">A soft, fluffy bread filled with sweet and savory filling, perfect for breakfast or snacks.</p>
                        </div>
                    </div>
                </div>
                <div class="col px-4">
                    <div class="card">
                        <img src="Assets/Images/pandesal.jpeg" class="card-img-top" alt="Pandesal" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Pandesal</h5>
                            <p class="card-text">A classic Filipino bread roll, slightly sweet and fluffy, enjoyed with butter or cheese.</p>
                        </div>
                    </div>
                </div>
                <div class="col px-4">
                    <div class="card">
                        <img src="Assets/Images/spanishbread.jpg" class="card-img-top" alt="Spanish Bread" style="width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">Spanish Bread</h5>
                            <p class="card-text">Soft bread filled with a buttery, sugary filling and a touch of cinnamon, perfect for a sweet snack.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="news">
            <h3 class="news-title text-center">What's New?</h3>
            <div class="container mt-4">
                <!-- desktop view -->
                <div class="row text-center g-4 d-none d-md-flex">
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">Freshly Baked Breads</h5>
                            <div class="card-body">
                                <h5 class="card-title">Delicious Sourdough</h5>
                                <p class="card-text">Our signature sourdough bread, baked fresh every morning with the finest ingredients. A perfect balance of tangy and soft.</p>
                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">Pastry Delights</h5>
                            <div class="card-body">
                                <h5 class="card-title">Flaky Croissants</h5>
                                <p class="card-text">Buttery, flaky, and golden croissants, made with love and the highest quality ingredients. Ideal for breakfast or a quick snack!</p>
                                <a href="#" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header">Seasonal Specials</h5>
                            <div class="card-body">
                                <h5 class="card-title">Pumpkin Spice Loaf</h5>
                                <p class="card-text">Our seasonal pumpkin spice loaf is back! Enjoy a moist, spiced loaf perfect for autumn or any cozy day of the year.</p>
                                <a href="#" class="btn btn-primary">Try it Now</a>
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
</body>