<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php' ;

$mail = new PHPMailer;

// SMTP configuration for Gmail
$mail->isSMTP();
$mail->SMTPDebug = 0; // Set this to 0 for production
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'sawvik.dipto10@gmail.com';
$mail->Password = 'bnpnrspugjozayak';

$mail->setFrom('sawvik.dipto10@gmail.com', 'Sawvik');
$mail->addAddress('fazlerabbirizon43@gmail.com', 'Rizon');
$mail->Subject = 'irteja';
$mail->Body = 'This is the body of your irteja';

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>