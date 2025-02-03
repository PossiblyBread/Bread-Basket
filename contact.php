<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <title>Bread & Basket - Contact</title>
</head>
<body>
    <?php include('header.php'); ?>
    <main id="contact">
        <div class="card">
            <h2 class="text-center mb-3">Contact Us</h2>
            <form class="row g-3" action="Manage/Mail/inquiry-submit.php" method="post" onsubmit="combineAddress()">
                <div class="col-md-12">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>
                <div class="col-md-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" required>
                </div>
                <div class="col-md-12">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="col-md-6">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>
                <div class="col-md-6">
                    <label for="barangay" class="form-label">Barangay</label>
                    <input type="text" class="form-control" id="barangay" name="barangay" required>
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="col-md-6">
                    <label for="province" class="form-label">Province</label>
                    <input type="text" class="form-control" id="province" name="province" required>
                </div>
                <div class="col-12">
                    <label for="message" class="form-label">Special Requests / Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                <input type="hidden" id="fullAddress" name="fullAddress">
                <div class="col-12">
                    <button type="submit" class="btn btn-warning w-100">Submit</button>
                </div>
            </form>
        </div>
    </main>
    <?php include('footer.php'); ?>
    <script>
        function combineAddress() {
            var street = document.getElementById("street").value;
            var barangay = document.getElementById("barangay").value;
            var city = document.getElementById("city").value;
            var province = document.getElementById("province").value;
            var fullAddress = street + ', ' + barangay + ', ' + city + ', ' + province;
            document.getElementById("fullAddress").value = fullAddress;
        }
    </script>
</body>
</html>
