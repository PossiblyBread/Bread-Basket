<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bread & Basket - About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .about-section {
            margin-top: 90px;
            padding: 2rem 0;
        }
        .about-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }
        .about-content {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 1.2rem;
        }
        .about-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 2rem;
        }
        .team-member {
            text-align: center;
            margin-bottom: 2rem;
        }
        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }
        .team-member h5 {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-header">
                <h1>About Bread & Basket</h1>
            </div>

            <div class="about-content">
                <p>Welcome to Bread & Basket Minimart! We are dedicated to providing the finest and freshest bread, pastries, and baked goods made with love. Our bakery believes in using only the highest quality ingredients to bring you delicious and wholesome products that you can enjoy every day.</p>
                <p>Our team is passionate about baking and creating the best bakery delights that bring comfort and joy. Whether you are here for a quick snack or to pick up freshly baked bread, we have something for everyone!</p>
            </div>

            <img src="Assets/Images/about-banner.jpg" alt="About Us" class="about-img">

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Team Member 1 -->
                <div class="col team-member">
                    <img src="Assets/Images/team-member1.jpg" alt="Team Member 1">
                    <h5>John Doe</h5>
                    <p>Founder & Head Baker</p>
                </div>
                <!-- Team Member 2 -->
                <div class="col team-member">
                    <img src="Assets/Images/team-member2.jpg" alt="Team Member 2">
                    <h5>Jane Smith</h5>
                    <p>Pastry Chef</p>
                </div>
                <!-- Team Member 3 -->
                <div class="col team-member">
                    <img src="Assets/Images/team-member3.jpg" alt="Team Member 3">
                    <h5>Sarah Lee</h5>
                    <p>Customer Service Manager</p>
                </div>
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
