<?php
include('../db_conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['product_name'] ?? '');
    $stocks = isset($_POST['product_stocks']) ? (int) $_POST['product_stocks'] : 0;
    $price = isset($_POST['product_price']) ? (float) $_POST['product_price'] : 0;
    $description = trim($_POST['product_description'] ?? '');
    $status = ($stocks > 0) ? 'In Stock' : 'Out of Stock';

    if (empty($name) || $stocks <= 0 || $price <= 0 || empty($description)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required and must have valid values.']);
        exit();
    }

    // Define absolute and relative upload paths
    $uploadDirAbsolute = __DIR__ . '../../ProductImg/'; // Absolute path
    $uploadDirRelative = 'ProductImg/'; // Relative path for database storage

    // Ensure directory exists
    if (!file_exists($uploadDirAbsolute)) {
        mkdir($uploadDirAbsolute, 0777, true);
    }

    $imagePath = ''; // Initialize variable

    // Handle file upload
    if (!empty($_FILES['product_image']['name']) && $_FILES['product_image']['error'] === 0) {
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));

        if (in_array($ext, $allowedTypes)) {
            // Sanitize filename
            $formattedName = preg_replace('/[^A-Za-z0-9]/', '', $name);
            $timestamp = date("Ymd_His");
            $imageName = $formattedName . '_' . $timestamp . '.' . $ext;

            // Define full paths
            $imagePathAbsolute = $uploadDirAbsolute . $imageName;
            $imagePathRelative = $uploadDirRelative . $imageName;

            // Move uploaded file
            if (!move_uploaded_file($_FILES['product_image']['tmp_name'], $imagePathAbsolute)) {
                echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
                exit();
            }

            $imagePath = $imagePathRelative;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid image format. Allowed formats: jpg, jpeg, png, gif.']);
            exit();
        }
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO products_tb (product_image, product_name, product_stocks, product_remaining_stocks, product_price, product_description, product_status, product_archive) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'SQL prepare statement failed: ' . $conn->error]);
        exit();
    }
    $productArchive = 'on';
    $stmt->bind_param("ssiiisss", $imagePath, $name, $stocks, $stocks, $price, $description, $status, $productArchive);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Product added successfully!', 'imagePath' => $imagePath]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $stmt->error]);
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
