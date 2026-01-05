<?php
$userEmail = "talhajahangir2008@gmail.com";   // user ki email
$trackingNumber = "TRK123456789";  // tracking number

$subject = "Your Order Tracking Number";
$message = "Hello,\n\nYour tracking number is: $trackingNumber\n\nThank you!";
$headers = "From: no-reply@yourwebsite.com";

if (mail($userEmail, $subject, $message, $headers)) {
    echo "Tracking number email sent successfully.";
} else {
    echo "Email send failed.";
}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // SMTP settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'talhajahangir2008@gmail.com';
    $mail->Password   = 'your-app-password';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Email details
    $mail->setFrom('yourgmail@gmail.com', 'Your Company');
    $mail->addAddress('user@example.com');

    $trackingNumber = "TRK123456789";

    $mail->Subject = 'Your Tracking Number';
    $mail->Body    = "Hello,\n\nYour tracking number is: $trackingNumber\n\nThank you!";

    $mail->send();
    echo "Tracking number email sent successfully.";
} catch (Exception $e) {
    echo "Email send failed: {$mail->ErrorInfo}";
}
?>
