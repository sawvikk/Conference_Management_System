<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($receiver, $subject, $body)
{
    // mail sending
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    //Load Composer's autoloader
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);
    $sender_email = 'mkrakib007@gmail.com';
    $sender_pass = 'zgbiyanpzdtzddoh';

    //Enable verbose debug output
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

    //Send using SMTP
    $mail->isSMTP();

    //Set the SMTP server to send through
    $mail->Host = 'smtp.gmail.com';

    //Enable SMTP authentication
    $mail->SMTPAuth = true;

    //SMTP username
    $mail->Username = $sender_email;

    //SMTP password
    $mail->Password = $sender_pass;

    //Enable TLS encryption;
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->Port = 587;

    //Recipients
    $mail->setFrom($sender_email, 'ictbj.jkkniu.edu.bd');

    //Add a recipient
    $mail->addAddress($receiver, "JKKNIU CONFERENCE");
    $mail->addReplyTo($sender_email);

    //Set email format to HTML
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $body;
    if ($mail->send()) {
        $mail->ClearAddresses();
        $mail->clearReplyTos();
    }
}
