<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);


try {

    $mail->isSMTP();
    $mail->Host  = "smtp.stackmail.com"; // or the SMTP host provided by Hostbeak
    $mail->SMTPAuth   = true;
    $mail->Username   = 'support@aurexprimetrust.com';
    $mail->Password   = 'Or9e25ba7';

    // Option 1 (recommended)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;


    $mail->Port= 465;

    // If Hostbeak specifies STARTTLS instead, use:
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->Port = 587;

    $mail->SMTPDebug = 0;

    $mail->setFrom('support@aurexprimetrust.com', $company_name);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $msg2;
    $mail->Timeout = 15;

    $mail->send();

    echo "Mail has been sent successfully!";

} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}

?>