<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

include('../db_conn.php');

$response = ["status" => "error", "message" => "Unknown error occurred."];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $name = isset($_POST['product_name']) ? trim($_POST['product_name']) : "";
        $stocks = isset($_POST['product_stocks']) ? (int)$_POST['product_stocks'] : 0;
        $remaining_stocks = isset($_POST['product_remaining_stocks']) ? (int)$_POST['product_remaining_stocks'] : 0;
        $price = isset($_POST['product_price']) ? (float)$_POST['product_price'] : 0.00;
        $description = isset($_POST['product_description']) ? trim($_POST['product_description']) : "";

        if ($id === 0 || empty($name)) {
            echo json_encode(["status" => "error", "message" => "Invalid product ID or name."]);
            exit;
        }

        // Determine stock status
        $remaining_percentage = ($stocks > 0) ? ($remaining_stocks / $stocks) * 100 : 0;

        if ($remaining_percentage >= 85) {
            $status = 'In Stock';
        } elseif ($remaining_percentage >= 50) {
            $status = 'Moderate';
        } elseif ($remaining_percentage >= 25) {
            $status = 'Low Stock';
        } else {
            $status = 'Critical';
        }

        // Fetch existing product image
        $oldImageQuery = "SELECT product_image FROM products_tb WHERE product_id = ?";
        $stmt = mysqli_prepare($conn, $oldImageQuery);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $oldImage = $row ? $row['product_image'] : null;
        mysqli_stmt_close($stmt);

        // Handle image upload
        $imageUpdate = "";
        if (!empty($_FILES['product_image']['name'])) {
            $ext = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
            $imageName = preg_replace('/[^A-Za-z0-9]/', '', $name) . '_' . time() . '.' . $ext;
            $newImagePath = 'ProductImg/' . $imageName;

            if (move_uploaded_file($_FILES['product_image']['tmp_name'], '../' . $newImagePath)) {
                if ($oldImage && file_exists('../' . $oldImage)) {
                    unlink('../' . $oldImage);
                }
                $imageUpdate = ", product_image = ?";
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to upload image."]);
                exit;
            }
        }

        // Update product (Using Prepared Statements)
        $sql = "UPDATE products_tb SET 
                    product_name = ?, 
                    product_stocks = ?, 
                    product_remaining_stocks = ?, 
                    product_price = ?, 
                    product_description = ?, 
                    product_status = ? 
                    $imageUpdate 
                WHERE product_id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        if ($imageUpdate) {
            mysqli_stmt_bind_param($stmt, "siidsssi", $name, $stocks, $remaining_stocks, $price, $description, $status, $newImagePath, $id);
        } else {
            mysqli_stmt_bind_param($stmt, "siidssi", $name, $stocks, $remaining_stocks, $price, $description, $status, $id);
        }

        if (mysqli_stmt_execute($stmt)) {
            $response = ["status" => "success", "message" => "Product updated successfully."];
        } else {
            $response = ["status" => "error", "message" => "Database update failed: " . mysqli_error($conn)];
        }

        mysqli_stmt_close($stmt);
    }
} catch (Exception $e) {
    $response = ["status" => "error", "message" => "Exception: " . $e->getMessage()];
}

// Ensure a valid JSON response
echo json_encode($response);
exit;
?>
