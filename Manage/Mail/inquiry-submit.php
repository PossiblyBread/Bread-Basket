<?php
    include('../db_conn.php');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullname = $_POST['fullName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['fullAddress']; 
        $message = $_POST['message'];
        $status = "new"; 

        $stmt = $conn->prepare("INSERT INTO inquiry_tb (inq_fullname, inq_email, inq_phone_num, inq_address, inq_message, inq_status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fullname, $email, $phone, $address, $message, $status);

        if ($stmt->execute()) {
            header("Location: ../../contact.php?status=success"); 
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    }
?>
