<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../Assets/PHPMailer/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = nl2br(htmlspecialchars($_POST['message']));

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'iantechsol0225@gmail.com'; //change required
        $mail->Password   = 'ddpowicgwebqfspr';  //change required
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('iantechsol0225@gmail.com', 'Bread & Basket Minimart'); //change required
        $mail->addAddress($email);
        $mail->addReplyTo('iantechsol0225@gmail.com', 'Bread & Basket Minimart'); //change required

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<p>{$message}</p>";
        $mail->AltBody = strip_tags($message);

        $mail->send();
        header("Location: ../../Admin/mailbox.php?status=Message-sent-successfully");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
