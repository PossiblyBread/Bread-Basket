<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../Assets/PHPMailer/vendor/autoload.php';
require '../db_conn.php'; 

define('SMTP_USERNAME', 'breadbasketminimart@gmail.com'); 
define('SMTP_PASSWORD', 'ektycelwrldxccri'); 

header('Content-Type: application/json'); // Ensure JSON response

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
    exit();
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = trim($_POST['subject']);
$message = nl2br(trim($_POST['message']));
$reply_id = isset($_POST['reply_id']) ? intval($_POST['reply_id']) : 0;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => "error", "message" => "Invalid email address."]);
    exit();
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->SMTPKeepAlive = true;  // Prevents reconnecting for each email
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USERNAME;
    $mail->Password   = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom(SMTP_USERNAME, 'Bread & Basket Minimart');
    $mail->addAddress($email);
    $mail->addReplyTo(SMTP_USERNAME, 'Bread & Basket Minimart');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "<p>{$message}</p>";
    $mail->AltBody = strip_tags($message);

    if ($mail->send()) {
        if ($reply_id > 0) {
            $update_sql = "UPDATE inquiry_tb SET inq_status = 'completed' WHERE inq_id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("i", $reply_id);
            if (!$stmt->execute()) {
                error_log("Database update failed: " . $stmt->error);
            }
        }
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Mail failed to send."]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "Mailer Error: " . $mail->ErrorInfo]);
}
?>
