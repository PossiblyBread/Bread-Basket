<?php
    include_once('Manage/db_conn.php');
    session_start();
        
    $error_message = '';
        
    if (isset($_SESSION['email'])) {
        header("Location: Admin/dashboard.php");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("SELECT * FROM account_tb WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email; 
            header("Location: Admin/dashboard.php"); 
        } else {
            $error_message = 'Invalid email or password'; 
        }

        $stmt->close();
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8 col-lg-9">
                <div class="login-card">
                    <div class="login-form">
                        <div class="card-body">
                            <h2 class="text-center mb-4">Login</h2>
                            <?php if (!empty($error_message)): ?>
                                <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
                            <?php endif; ?>
                            <form action="login.php" method="POST">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                    <div class="login-image text-center">
                        <img src="Assets/Images/BREAD&BASKET.png" alt="Login Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<style>
    body {
        background-image: url('Assets/Images/background-image.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        position: relative;
    }
    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4); 
    }
    .login-card {
        display: flex;
        flex-direction: row;
        background-color: #fff;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        z-index: 1;
    }
    .login-form {
        flex: 1;
        padding: 30px;
        background-color: #f8f5f0; 
        border-radius: 10px;
    }
    .login-image {
        flex: 1;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
    }
    .login-image img {
        max-width: 80%;
        height: auto;
    }
    .btn-primary {
        background-color: #8B4513; 
        border-color: #8B4513;
    }
    .btn-primary:hover {
        background-color: #A0522D; 
        border-color: #A0522D;
    }
    .btn-primary:focus, .btn-primary:active {
        box-shadow: 0 0 0 0.2rem rgba(138, 61, 28, 0.5);
    }
    @media (max-width: 768px) {
        .login-card {
            flex-direction: column;
        }
        .login-image {
            display: none;
        }
    }
</style>