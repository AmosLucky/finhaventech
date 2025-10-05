<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);




try {
  
    $mail->SMTPDebug = 2;                                   
    $mail->isSMTP();                                            
    $mail->Host  = "ssl://smtp.hostinger.com";                 
    $mail->SMTPAuth = true;                         
    $mail->Username = "support@blue-ridgetrust.com";               
    $mail->Password = 'blueridge1@gmail.COM';                       
    $mail->SMTPSecure = 'tls';                          
    $mail->Port  = 465;

    //$mail->protocol = "mail";
    //$config['smtp_port'] = 587;
    $mail->SMTPDebug  = 0; 

    $mail->setFrom("support@blue-ridgetrust.com", $company_name);     
    $mail->addAddress($email, $company_name);
    
    $mail->isHTML(true);                                
   $mail->Subject = $subject;
    $mail->Body = $msg2;
    //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
   echo "Mail has been sent successfully!";
} catch (Exception $e) {
  // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  // echo "Error occoured";
}


?>

