<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "breadandbasket_db";

    $conn = new mysqli($servername, $username, $password, $database_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    date_default_timezone_set('Asia/Manila');
?>