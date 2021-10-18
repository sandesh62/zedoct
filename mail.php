<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Email subject and body text.

$to = "test@grr.la";
$subject = 'wp_mail function test';
$message = 'This is a test of the wp_mail function: wp_mail is working';
$headers = "From: info@zedaid.org" . "\r";
require('wp-load.php');
$sent_message = wp_mail( $to, $subject, $message, $headers );
//display message based on the result.
if ( $sent_message ) {
    // The message was sent.
    echo 'The test message was sent. Check your email inbox.';
} else {
    // The message was not sent.
    echo 'The message was not sent!';
}
exit;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();

$subject2 = "Welcome at BlueMagic Group!";
$to2 = "test@grr.la";

$mail = new PHPMailer();
//$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "ssl://smtp.gmail.com";
$mail->Username   = "developer.zed2020@gmail.com";
$mail->Password   = "Developer@123";
$mail->IsHTML(true);
$mail->AddAddress("test@grr.la", "Piyush");
$mail->SetFrom("info@zedaid.org", "ZedAid");
//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
$mail->Body = $content; 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
exit;

$mail2->Mailer = "smtp";
$mail2->Host = 'smtp.gmail.com';
$mail2->Port = 587;
$mail2->SMTPAuth = true;
$mail2->SMTPSecure = "tls";
$mail2->Username = 'developer.zed2020@gmail.com';
$mail2->Password = 'Developer@123';
$mail2->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail2->setFrom('info@zedaid.org', 'ZedAid');
$mail2->addAddress($to2);
$mail2->isHTML(true);
$mail2->Subject = $subject2;
$content2 = "<b>welcome ZedAid</b>";
$mail2->WordWrap   = 80;
$mail2->Body = $content2;

$result = $mail2->Send();
var_dump($result);

if (!$result) {
    echo "error";
    exit;
}